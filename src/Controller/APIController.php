<?php

namespace App\Controller;

use App\Service\KeycloakApiSrv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/public/api")
 */
class APIController extends AbstractController
{

    private $keycloakService;

    public function __construct(KeycloakApiSrv $service)
    {
        $this->keycloakService = $service;
    }

    #[Route('/add/user', name: 'api_add_user', methods: ['POST'])]
    public function addUserFromExtranet(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $username = $data["username"];
        $email = $data["email"];
        $firstname = $data["firstname"];
        $lastname = $data["lastname"];
        $password = $data["password"];

        if (empty($username) || empty($email) || empty($firstname) || empty($lastname) || empty($password)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $response = $this->keycloakService->postUsuario(
            $username,
            $email,
            $firstname,
            $lastname,
            $password,
            true,
            $this->getParameter('keycloak_extranet_realm')
        );

        if ($response->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        }


        return new JsonResponse(["status" => "success", "message" => "Usuario creado correctamente."]);
    }

    #[Route('/add/group/user', name: 'api_add_group_user', methods: ['POST'])]
    public function addGroupToUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(),true);
        $username = $data["username"];
        $groups = $data["groups"];
        
        if (empty($username) || empty($groups)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $user = $this->keycloakService->getUserByUsernameAndRealm($username, $this->getParameter('keycloak_extranet_realm'));

        if(empty($user[0])){
            return new JsonResponse(["status" => "error", "message" => "El usuario no se encuentra en keycloak."]);
        }

        foreach ($groups as $_group) {
            $group = $this->keycloakService->getGroup($_group,$this->getParameter('keycloak_extranet_realm'));
            $putGroupResponse = $this->keycloakService->addUserToGroup(
                $this->getParameter('keycloak_extranet_realm'),
                $user[0]->id,
                $group->id
            );
        }

        if ($putGroupResponse->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        }

        return new JsonResponse(["status" => "success", "message" => "Grupo asignado correctamente."]);
    }

    #[Route('/get/group', name: 'api_get_group')]
    public function getGroup(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $group = $data["group"];
        $realm = $data["realm"];

        if (empty($group) || empty($realm)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $res = $this->keycloakService->getGroup($group,$realm);

       /*  if ($res->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        } */

        return new JsonResponse((array)$res,Response::HTTP_OK);
    }

    #[Route('/get/role', name: 'api_get_role')]
    public function getRole(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $role = $data["role"];
        $realm = $data["realm"];

        if (empty($role) || empty($realm)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $res = $this->keycloakService->getRole($role,$realm);

     /*    if ($res->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        } */

        return new JsonResponse((array)$res,Response::HTTP_OK);
    }

    #[Route('/get/user/username', name: 'api_get_user_username')]
    public function getUsuarioByUsername(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $username = $data["username"];
        $realm = $data["realm"];
        if (empty($username) || empty($realm)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $res = $this->keycloakService->getUserByUsernameAndRealm($username,$realm);

     /*    if ($res->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        } */

        return new JsonResponse((array)$res,Response::HTTP_OK);
    }

    #[Route('/get/user/email', name: 'api_get_user_email')]
    public function getUsuarioByEmail(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data["email"];
        $realm = $data["realm"];
        if (empty($email) || empty($realm)) {
            throw new NotFoundHttpException("Expecting mandatory parameters!");
        }

        $res = $this->keycloakService->getUserByEmailAndRealm($email,$realm);

     /*    if ($res->getStatusCode() == 500) {
            return new JsonResponse(["status" => "error", "message" => "Ha ocurrido un error y la operación no pudo completarse."]);
        } */

        return new JsonResponse((array)$res,Response::HTTP_OK);
    }

}
