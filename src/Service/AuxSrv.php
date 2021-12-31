<?php

namespace App\Service;

use App\Entity\Dispositivo;
use App\Entity\DispositivoResponsable;
use App\Entity\Realm;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Service\KeycloakApiSrv;
use DateTime;
use GuzzleHttp;
use Symfony\Component\Routing\RouterInterface;

/**
 * Sumario controller.
 */
class AuxSrv extends AbstractController
{
    private $client;
    private $parameterBag;
    private $mailer;
    private $router;

    public function __construct(ParameterBagInterface $parameterBag, KeycloakApiSrv $keycloak,MailerInterface $mailer,RouterInterface $router) {
        $this->client = new GuzzleHttp\Client();
        $this->parameterBag = $parameterBag;
        $this->kc = $keycloak;
        $this->mailer = $mailer;
        $this->router = $router;
    }

    /**
     * Crea un usuario en Keycloak, en la DB y envía un email al invitado con los datos de acceso
     */
    public function createKeycloakcAndDatabaseUser($personaFisica, $solicitud, $realm) {
        $entityManager = $this->getDoctrine()->getManager();
        $password = substr(md5(uniqid(rand(1, 100))), 1, 6);
        $realmDB = $entityManager
            ->getRepository(Realm::class)
            ->findOneBy(['realm' => $realm]);
        $this->kc->postUsuario(
            $personaFisica->getCuitCuil(), //username
            $solicitud->getMail(), //email
            $personaFisica->getNombres(), //firstName
            $personaFisica->getApellido(), //lastName
            $password, //password
            true, //Temporally
            $realm //realm
        );
        
        $usuarioKC = $this->kc->getUserByUsernameAndRealm($personaFisica->getCuitCuil(), $realm);

        $usuarioDB = new User();
        $usuarioDB->setUsername($personaFisica->getCuitCuil());
        $usuarioDB->setPassword('');
        $usuarioDB->setEmail($solicitud->getMail());
        $usuarioDB->setRoles(['ROLE_USER']);        
        $usuarioDB->setPersonaFisica($personaFisica);
        $usuarioDB->setKeycloakId($usuarioKC[0]->id);
        $usuarioDB->setRealm($realmDB);
        //Envia mail con los datos de acceso
        $email = (new TemplatedEmail())
            ->from($this->getParameter('direccion_email_salida'))
            ->to($solicitud->getMail())
            ->subject('Solicitud aprobada: Datos de acceso')
            ->htmlTemplate('emails/invitacionPasoTres.html.twig')
            ->context([
                'nicname' => $solicitud->getNicname(),
                'user' => $solicitud->getPersonaFisica()->getCuitCuil(),
                'password' => $password,
                'url' => $this->router->generate(
                    'dashboard',
                    [],
                    urlGeneratorInterface::ABSOLUTE_URL
                ),
            ]);
        $solicitud->setUsuario($usuarioDB);
        $this->mailer->send($email);

        $entityManager->persist($usuarioDB);
        $entityManager->persist($solicitud);
        $entityManager->flush();
        $data = [
            'usuarioKC' => $usuarioKC,
            'usuarioDB' => $usuarioDB,
        ];
        return $data;
    }

    public function CrearDispositivoAndResponsable($solicitud){
        $dispositivo = new Dispositivo();
        $dispositivo->setNicname($solicitud->getNicname());
        $dispositivo->setFechaAlta(new DateTime());
        //Asignamos el responsable al dispositivo
        $dispositivoResponsable = new DispositivoResponsable();
        $dispositivoResponsable->setPersonaFisica($solicitud->getPersonaFisica());
        $dispositivoResponsable->setDispositivo($dispositivo);
        $dispositivoResponsable->setOwner(true);
        $dispositivo->addResponsable($dispositivoResponsable);
        $dispositivo->setPersonaJuridica($solicitud->getPersonaJuridica());
        $solicitud->setDispositivo($dispositivo);
        $solicitud->setFechaAlta(new DateTime());
        return $solicitud;
    }

}
