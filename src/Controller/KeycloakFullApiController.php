<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp;

/**
 * Sumario controller.
 */
class KeycloakFullApiController extends AbstractController
{
    private $client;
    protected $container;

    //public function __construct(ContainerInterface $container){
    public function __construct()
    {
        //$this->container = $container;
        $this->client = new GuzzleHttp\Client();
    }

    /**
     * GET /admin/realms/{realm}/users/{id}/role-mappings/clients/{client}/composite
     * /auth/admin/realms/{realm}/users/{user-uuid}/role-mappings/clients/{client-uuid}
     */
    public function getRolesComposite($usuario_id)
    {
        $token = $this->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri =
            $base_uri_keycloak .
            '/admin/realms/{realm}/users/{id}/role-mappings/clients/{client_uuid}';

        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{id}', $usuario_id, $uri);
        $client_id = $this->getParameter('keycloak-client-uuid');
        $uri = str_replace('{client_uuid}', $client_id, $uri);

        //dd($uri);
        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    //Crea un nuevo usuario
    public function postUsuario(
        $username,
        $email,
        $firstname,
        $lastname,
        $password,
        $temporary,
        $realm
    ) {
        // Testing created user: http://localhost:8180/auth/realms/Testkeycloak/account
        // Testing http trafic sudo tcpflow -i any -C port 8180 (https://www.it-swarm-es.com/es/linux/cual-es-la-forma-mas-facil-de-detectar-tcp-datos-de-trafico-en-linux/957498336/ )
        // example creating user https://www.appsdeveloperblog.com/keycloak-rest-api-create-a-new-user/

        $token = $this->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users';
        //$realm=$this->getParameter('keycloak_realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'username' => $username,
                'email' => $email,
                'firstName' => $firstname,
                'lastName' => $lastname,
                'enabled' => true,
                'credentials' => [
                    0 => [
                        'type' => 'password',
                        'value' => $password,
                        'temporary' => $temporary,
                    ],
                ],
            ],
        ];

        $res = $this->client->post($uri, $params);
        $data = json_decode($res->getBody());
        //dd($data);
        $response = new Response($data);
        return $response;
    }

    public function setPassword($username, $newpassword)
    {
        // Testing created user: http://localhost:8180/auth/realms/Testkeycloak/account
        // Testing http trafic sudo tcpflow -i any -C port 8180 (https://www.it-swarm-es.com/es/linux/cual-es-la-forma-mas-facil-de-detectar-tcp-datos-de-trafico-en-linux/957498336/ )
        // example creating user https://www.appsdeveloperblog.com/keycloak-rest-api-create-a-new-user/

        $user = $this->getUserByUsername($username);
        //dd($user);
        $token = $this->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri =
            $base_uri_keycloak .
            '/admin/realms/{realm}/users/{user_id}/reset-password';
        $realm = $this->getParameter('keycloak_realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $user[0]->id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'type' => 'password',
                'value' => $newpassword,
                'temporary' => 'false',
            ],
        ];

        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getBody());
        dd($data);
        return $data;
    }

    public function updateUsuario($username, $modif)
    {
        // Testing created user: http://localhost:8180/auth/realms/Testkeycloak/account
        // Testing http trafic sudo tcpflow -i any -C port 8180 (https://www.it-swarm-es.com/es/linux/cual-es-la-forma-mas-facil-de-detectar-tcp-datos-de-trafico-en-linux/957498336/ )
        // example creating user https://www.appsdeveloperblog.com/keycloak-rest-api-create-a-new-user/

        $user = $this->getUserByUsername($username);
        $token = $this->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{user_id}';
        $realm = $this->getParameter('keycloak_realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $user[0]->id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => $modif,
        ];

        //dd($params);

        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getBody());
        dd($data);
        return $data;
    }

    /**
     * GET /admin/realms/{realm}/users/{id}/groups
     */
    public function getUserGroups($usuario_id)
    {
        $token = $this->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{id}/groups';

        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{id}', $usuario_id, $uri);

        //dd($uri);
        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * GET /admin/realms/{realm}/clients
     */
    public function getClients($realm, $access_token)
    {
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/clients';
        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $access_token],
            'query' => [
                'clientId' => 'sumarios-client',
            ],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * POST /realms/master/protocol/openid-connect/token
     */
    public function getTokenAdmin()
    {
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri =
            $base_uri_keycloak . '/realms/master/protocol/openid-connect/token';
        $parametros = [
            'form_params' => [
                'username' => $this->getParameter('keycloak_admin_username'),
                'password' => $this->getParameter('keycloak_admin_password'),
                'grant_type' => $this->getParameter(
                    'keycloak_admin_grant_type'
                ),
                'client_id' => $this->getParameter('keycloak_admin_client_id'),
                'client_secret' => $this->getParameter(
                    'Keycloak_admin_client_secret'
                ),
            ],
        ];
        //dd($parametros);
        $res = $this->client->post($uri, $parametros);
        $data = json_decode($res->getBody());
        return $data;
    }

    /**
     * POST /admin/realms/{realm}/users/{id}/logout
     */
    public function logout($usuario_id)
    {
        $token = $this->get('keycloak_api')->getTokenAdmin();
        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $realm = $this->getParameter('keycloak-realm');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{id}/logout';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{id}', $usuario_id, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->post($uri, $params);
        $data = json_decode($res->getBody());
    }

    /**
     * List all users in the realm
     * GET /admin/realms/{realm}/users
     */
    public function getUsers($realm)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users';
        //$realm=$this->getParameter($realm);
        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];
        //,
        //'query' => $options

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return new JsonResponse($data);
    }

    /**
     * List one user in the realm by username
     * GET /admin/realms/{realm}/users
     */
    public function getUserByUsername($username)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users';
        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = $uri . '?username=' . $username;

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];
        //echo $uri."<br>";
        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * List one user in the realm by username and realm
     * GET /admin/realms/{realm}/users
     */
    public function getUserByUsernameAndRealm($username, $realm)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users';
        //$realm=$this->getParameter('keycloak-realm');

        $uri = str_replace('{realm}', $realm, $uri);
        $uri = $uri . '?username=' . $username;

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];
        //echo $uri."<br>";
        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());
        return new JsonResponse($data[0]);
    }

    public function getUserByIdAndRealm($id, $realm)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users/{id}';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{id}', $id, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * GET /admin/realms/{realm}/users/{id}
     */
    public function getUserById($id)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users/{id}';
        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{id}', $id, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * GET /admin/realms/{realm}/groups/{id}/members
     * Query(optional): first (pagination offset), max (max result size)
     */
    public function getUsersSumarios()
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/groups/{id}/members';

        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);

        $group = $this->getGroup('sum_usuarios');
        $uri = str_replace('{id}', $group->id, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * GET /admin/realms/{realm}/groups
     */
    public function getGroup($name)
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/groups';
        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $grupos = json_decode($res->getBody());
        foreach ($grupos as $grupo) {
            if ($grupo->name == $name) {
                break;
            }
        }

        return $grupo;
    }

    /**
     * GET /admin/realms/{realm}/users/count
     */
    public function getUsersCount()
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users/count';
        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    /**
     * GET /admin/realms/{realm}/users/{id}/groups
     */
    public function getUsersGroups()
    {
        $token = $this->getTokenAdmin();

        $auth_url = $this->getParameter('keycloak-server-url');
        $uri = $auth_url . '/admin/realms/{realm}/users/{id}/groups';
        $realm = $this->getParameter('keycloak-realm');
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace(
            '{id}',
            $this->getRequest()
                ->getSession()
                ->get('ID_usuario'),
            $uri
        );

        $params = [
            'headers' => ['Authorization' => 'Bearer ' . $token->access_token],
        ];

        $res = $this->client->get($uri, $params);
        $data = json_decode($res->getBody());

        return $data;
    }

    public function findAllUsuariosOrganigramaAsistentes($org)
    {
        $cOrganigramas = [$org . '0', $org . '2', $org . '3', $org . '7'];

        $usuarios = $this->getUsersSumarios();

        $data = [];

        foreach ($usuarios as $usuario) {
            if (
                in_array($usuario->attributes->organigrama[0], $cOrganigramas)
            ) {
                $data[] = $usuario;
            }
        }

        return $data;
    }

    public function findAllUsuariosOrganigramaByTerm($org, $term)
    {
        return $this->getUsuarioSumariosFilterBy(['organigrama' => $org]);
    }

    public function getUsuarioSumariosFilterBy($attributes)
    {
        $data = [];
        $usuarios_sumarios = $this->getUsersSumarios();
        foreach ($usuarios_sumarios as $usuario) {
            foreach ($attributes as $key => $value) {
                if ($usuario->attributes->$key[0] = $value) {
                    $data[] = $usuario;
                }
            }
        }
        return $data;
    }

    public function findAllUsuariosOrganigrama($org)
    {
        return $this->findAllUsuariosOrganigramaByTerm($org, '');
    }

    public function disableUser($id, $realm)
    {
        // Testing created user: http://localhost:8180/auth/realms/Testkeycloak/account
        // Testing http trafic sudo tcpflow -i any -C port 8180 (https://www.it-swarm-es.com/es/linux/cual-es-la-forma-mas-facil-de-detectar-tcp-datos-de-trafico-en-linux/957498336/ )
        // example creating user https://www.appsdeveloperblog.com/keycloak-rest-api-create-a-new-user/

        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{user_id}';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'enabled' => false,
            ],
        ];

        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getBody());
        //dd($data);
        return $data;
    }

    public function reactivateUser($id, $realm)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{user_id}';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'enabled' => true,
            ],
        ];

        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getBody());
        return $data;
    }

    public function resetPasswordUser($id, $realm, $password)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{user_id}';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'credentials' => [
                    0 => [
                        'type' => 'password',
                        'value' => $password,
                        'temporary' => true,
                    ],
                ],
            ],
        ];

        $res = $this->client->put($uri, $params);
        $statusCode = $res->getStatusCode();
        $usuario = $this->getUserByIdAndRealm($id, $realm);
        //$data = json_decode($res->getBody());
        $data = ['statusCode' => $statusCode, 'usuario' => $usuario];
        return new JsonResponse($data);
    }

    public function changeUserPassword($id, $realm, $password)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/users/{user_id}';
        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $id, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
            'json' => [
                'credentials' => [
                    0 => [
                        'type' => 'password',
                        'value' => $password,
                        'temporary' => false,
                    ],
                ],
            ],
        ];

        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getStatusCode());
        return new JsonResponse($data);
    }

    /**
     * Create a gruoup in the realm
     * POST /admin/realms/{realm}/groups/
     */
    public function createKeycloakGroupInRealm($realm, $name)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms/{realm}/groups';

        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => false,
            'json' => [
                'name' => $name,
            ],
        ];

        $res = $this->client->post($uri, $params);

        $data = json_decode($res->getStatusCode());
        return new JsonResponse($data);
    }

    /**
     * View a gruoup in the realm
     * POST /admin/realms/{realm}/groups/
     */
    public function viewKeycloakGroupInRealm($realm, $name)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri =
            $base_uri_keycloak . '/admin/realms/{realm}/groups?search=' . $name;

        $uri = str_replace('{realm}', $realm, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => false,
            'json' => [
                'name' => $name,
            ],
        ];

        $res = $this->client->post($uri, $params);

        $data = json_decode($res->getStatusCode());
        return new JsonResponse($data);
    }

    /**
     * create a keycloak realm
     * POST /admin/realms/{realm}/groups/
     */
    public function createKeycloakRealm($name)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri = $base_uri_keycloak . '/admin/realms';

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => false,
            'json' => [
                'realm' => $name,
                'displayName' => $name,
                'enabled' => true,
            ],
        ];

        $res = $this->client->post($uri, $params);

        $data = json_decode($res->getStatusCode());
        return new JsonResponse($data);
    }

    public function addUserToGroup($realm, $userId, $groupId)
    {
        $token = $this->getTokenAdmin();

        $base_uri_keycloak = $this->getParameter('keycloak-server-url');
        $uri =
            $base_uri_keycloak .
            '/admin/realms/{realm}/users/{user_id}/groups/{group_id}';

        $uri = str_replace('{realm}', $realm, $uri);
        $uri = str_replace('{user_id}', $userId, $uri);
        $uri = str_replace('{group_id}', $groupId, $uri);

        $params = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token->access_token,
            ],
            'debug' => true,
        ];
        $res = $this->client->put($uri, $params);

        $data = json_decode($res->getStatusCode());
        return new JsonResponse($data);
    }
}
