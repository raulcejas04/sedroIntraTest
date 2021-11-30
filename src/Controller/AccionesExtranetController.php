<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

/**
 * @Route("/acciones-extranet")
 */
class AccionesExtranetController extends AbstractController
{
    #[Route('/lista', name: 'usuarios_extranet')]
    public function listaUsuariosExtranet(): Response
    {
        $usuarios = $this->getAllExtranetUsers();

        // print_r($usuarios); die()
        $response = $this->render(
            'acciones_extranet/usuariosExtranet.html.twig',
            [
                'usuarios' => $usuarios,
            ]
        );
        return $response;
    }

    //TODO: estas 2 fucniones se pueden unir en una sola. Solamente hay que pasar un parámetro TRUE o FALSE para activar o desactivar un usuario
    /**
     * @Route("/{id}/deshabilitar-usuario", name="deshabilitar_usuario")
     */
    public function disableUser($id): Response
    {
        $this->forward(
            'App\Controller\KeycloakFullApiController::disableUser',
            [
                'id' => $id,
                'realm' => $this->getParameter('keycloak_extranet_realm'),
            ]
        );

        return $this->redirectToRoute('usuarios_extranet');
    }

    /**
     * @Route("/{id}/rehabilitar-usuario", name="rehabilitar_usuario")
     */
    public function reactivateUser($id): Response
    {
        $this->forward(
            'App\Controller\KeycloakFullApiController::reactivateUser',
            [
                'id' => $id,
                'realm' => $this->getParameter('keycloak_extranet_realm'),
            ]
        );

        return $this->redirectToRoute('usuarios_extranet');
    }

    /**
     * @Route("/{id}/blanquear-password", name="blanquear_password_usuario")
     */
    public function blanquearPassword($id, MailerInterface $mailer): Response
    {
        $password = substr(md5(uniqid(rand(1, 100))), 1, 6);
        $data = $this->forward(
            'App\Controller\KeycloakFullApiController::resetPasswordUser',
            [
                'id' => $id,
                'realm' => $this->getParameter('keycloak_extranet_realm'),
                'password' => $password,
            ]
        );

        $data = json_decode($data->getContent(), true);

        $email = (new TemplatedEmail())
            ->from($this->getParameter('direccion_email_salida'))
            ->to($data['usuario']['email'])
            ->subject('Contraseña blanqueada: Datos de acceso')
            ->htmlTemplate('emails/blanqueoDePassword.html.twig')
            ->context([
                'name' =>
                    $data['usuario']['firstName'] .
                    ' ' .
                    $data['usuario']['lastName'],
                'user' => $data['usuario']['username'],
                'password' => $password,
                'url' => $this->getParameter('extranet_url') . '/dashboard',
            ]);

        $mailer->send($email);

        $this->addFlash(
            'success',
            'El usuario ' .
                $data['usuario']['firstName'] .
                ' ' .
                $data['usuario']['lastName'] .
                ' ha sido blanqueado. Se ha enviado un email con los datos de acceso.'
        );
        return $this->redirectToRoute('usuarios_extranet');
    }

    /**
     * @Route("/dashboard/pruebas-extranet", name="pruebas_extranet")
     */
    public function pruebasEnExtranet()
    {
        $response = $this->render(
            'acciones_extranet/pruebasEnExtranet.html.twig',
            []
        );
        return $response;
    }

    /**
     * @Route("/dashboard/pruebas-extranet/crear-grupo", name="pruebas_extranet_grupo")
     */
    public function pruebasEnExtranetCrearGrupo()
    {
        $nombre = 'Prueba';
        $grupo = $this->forward(
            'App\Controller\KeycloakFullApiController::createKeycloakGroupInRealm',
            [
                'realm' => $this->getParameter('keycloak_extranet_realm'),
                'name' => $nombre,
            ]
        );

        switch ($grupo->getStatusCode()) {
            case 200:
                $this->addFlash(
                    'alert-success',
                    'Grupo creado correctamente'
                );
                break;
            case 201:
                $this->addFlash(
                    'alert-success',
                    'Grupo creado correctamente'
                );
                break;
            case 409:
                $this->addFlash(
                    'alert-error',
                    'El grupo ya existe'
                );
            case 500:
                $this->addFlash(
                    'alert-error',
                    'Error al crear el grupo'
                );
                break;
            }

        $response = $this->render(
            'acciones_extranet/pruebasEnExtranet.html.twig',
            []
        );
        return $response;
    }

    private function getAllExtranetUsers()
    {
        $usuariosExtranet = $this->forward(
            'App\Controller\KeycloakFullApiController::getUsers',
            [
                'realm' => $this->getParameter('keycloak_extranet_realm'),
            ]
        );

        $usuarios = json_decode($usuariosExtranet->getContent(), true);
        return $usuarios;
    }
}
