<?php

namespace App\Security;

use App\Entity\User;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class KeycloakAuthenticator
 */
class KeycloakAuthenticator extends SocialAuthenticator {

    private $clientRegistry;
    private $em;
    private $router;
    private $keycloakService;

    public function __construct(ClientRegistry $clientRegistry, EntityManagerInterface $em, RouterInterface $router, \App\Service\KeycloakApiSrv $service) {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
        $this->router = $router;
        $this->keycloakService = $service;
    }

    public function start(Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $authException = null) {
        return new RedirectResponse(
                '/oauth/login', // might be the site, where users choose their oauth provider
                Response::HTTP_TEMPORARY_REDIRECT
        );
    }

    public function supports(Request $request) {
        return $request->attributes->get('_route') === 'oauth_check';
    }

    public function getCredentials(Request $request) {
        $credentials = $this->fetchAccessToken($this->getKeycloakClient());
        $refreshToken = $credentials->getRefreshToken();
        $token = $credentials->getToken();
        $session = new Session();
        $session->set('refreshToken', $refreshToken);
        $session->set('token', $token);

        return $credentials;
    }

    public function getUser($credentials, \Symfony\Component\Security\Core\User\UserProviderInterface $userProvider) {
        //$client = $this->clientRegistry->getClient('keycloak');
        //$client = $this->getKeycloakClient();

        $token = $credentials->getToken(); //esto anda, pero no me deja sacar el refreshtoken
        $expires = $credentials->getExpires();
        //dd(date('Y-m-d H:i:s',$expires));

        $keycloakUser = $this->getKeycloakClient()->fetchUserFromToken($credentials);
        $data = $keycloakUser->toArray();
        //dd($keycloakUser);
        //dd($keycloakUser->toArray()['preferred_username']);
        //existing user ?
        $existingUser = $this
                ->em
                ->getRepository(User::class)
                ->findOneBy(['KeycloakId' => $keycloakUser->getId()]);

        if ($existingUser) {
            if (array_key_exists("roles", $data)) {
                $existingUser->setRoles($data["roles"]);
            }
        } else {
            // if user exist but never connected with keycloak
            $email = $keycloakUser->getEmail();
            /** @var User $userInDatabase */
            $userInDatabase = $this->em->getRepository(User::class)
                    ->findOneBy(['email' => $email]);
            if ($userInDatabase) {
                $userInDatabase->setKeycloakId($keycloakUser->getId());
                $this->em->persist($userInDatabase);
                $this->em->flush();
                return $userInDatabase;
            }
            //user not exist in database
            $newUser = new User();
            $newUser->setKeycloakId($keycloakUser->getId());
            $newUser->setEmail($keycloakUser->getEmail());
            //$user->setUsername($keycloakUser->getPreferredUsername());
            //TODO: Ver esto! ROLE_ADMIN--- Podría ser preguntando de cual Realm proviene el usuario que nos de el ROLE_*??
            if (array_key_exists("roles", $data)) {
                $newUser->setRoles($data["roles"]);
            }
            $newUser->setPassword('');
            $this->em->persist($newUser);
            $this->em->flush();
        }

        $user = $existingUser ? $existingUser : $newUser;

        /** GRUPO Y ROLES * */
        // ¿¿¿Es factible generar esto acá????
        //Leemos los grupos y agregamos a la db en caso de que no exista. Si existe actualiza la información.
        if (array_key_exists("groups", $data)) {
            foreach ($data["groups"] as $group) {
                $res = $this->keycloakService->getGroup($group);
                $existingGroup = $this->em->getRepository(\App\Entity\Grupo::class)->findOneBy(["KeycloakGroupId" => $res->id]);
                $g = $existingGroup ? $existingGroup : new \App\Entity\Grupo();
                $g->setKeycloakGroupId($res->id);
                $g->setNombre($res->name);
                $this->em->persist($g);
                $this->em->flush();

                //TODO: Setear tipo de dispositivos, podríamos hacerlo con los atributos del grupo
            }
        }

        if (array_key_exists("roles", $data)) {
            //Buscamos todos los roles con este usuario y los borramos
            //Esto para agregarlos abajo y tener siempre los mismos datos de keycloak y ningun otro repetido y/o agregado erroneamente.
            $userRoles = $this->em->getRepository(\App\Entity\UserRole::class)->findBy([
                "Usuario" => $user
            ]);

            foreach ($userRoles as $userRole) {
                //TODO: Definir baja lógica o física en este caso especial
                //Por qué no uso baja lógica?
                //Cada vez que el usuario loguee, acumularia estos datos con fechaBaja
                //Creo que en este caso puntual es necesario la baja física
                //Ya que es algo que no necesitariamos recuperar de la bd a futuro y puede acumularse en gran medida innecesariamente
                $this->em->remove($userRole);
                $this->em->flush();
            }

            foreach ($data["roles"] as $role) {
                //Se remueve el prefijo para acertar la búsqueda, debe ser igual al que está en el mapper del cliente en keycloak
                $res = $this->keycloakService->getRole(str_replace("ROLE_", "", $role));
                $existingRole = $this->em->getRepository(\App\Entity\Role::class)->findOneBy(["keycloakRoleId" => $res->id]);
                $r = $existingRole ? $existingRole : new \App\Entity\Role();
                $r->setKeycloakRoleId($res->id);
                $r->setCode("ROLE_" . $res->name);
                //TODO: Traer la descripción del role (puede sacarse de atributos, pero quiero ver si hay una forma directa)
                $r->setName($res->name);

                $userRole = new \App\Entity\UserRole();
                $userRole->setRole($r);
                $userRole->setUsuario($user);
                $r->addUserRole($userRole);

                $this->em->persist($r);
                $this->em->flush();
            }
        }
        /** FIN GRUPO Y ROLES * */
        return $user;
    }

    public function onAuthenticationFailure(Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $exception) {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        return new Response($message, Response::HTTP_FORBIDDEN);
    }

    public function onAuthenticationSuccess(Request $request, \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token, string $providerKey) {
        //dd($token);
        // change "app_homepage" to some route in your app
        $targetUrl = $this->router->generate('dashboard');

        return new RedirectResponse($targetUrl);
    }

    /**
     * @return \KnpU\OAuth2ClientBundle\Client\Provider\KeycloakClient
     */
    private function getKeycloakClient() {
        return $this->clientRegistry->getClient('keycloak');
    }

}
