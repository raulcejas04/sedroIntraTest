<?php

namespace App\Controller;

use App\Service\KeycloakApiSrv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
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
}
