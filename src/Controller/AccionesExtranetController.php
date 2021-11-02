<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 
 */
class AccionesExtranetController extends AbstractController
{
    #[Route('/acciones-extranet/lista', name: 'usuarios_extranet')]
    public function listaUsuariosExtranet(): Response
    {

        $usuarios = $this->getAllExtranetUsers();
        
       // print_r($usuarios); die()
        $response = $this->render('acciones_extranet/usuariosExtranet.html.twig', [
            'usuarios' => $usuarios,
        ]);
        return $response;
    }

    /**
     * @Route("/acciones-extranet/{id}/deshabilitar-usuario", name="deshabilitar_usuario")
     */
    public function disableUser($id): Response
    {

        $usuariosExtranet = $this->forward('App\Controller\KeycloakFullApiController::disableUser', [
            'id' => $id,
            'realm' => 'Extranet'
        ]);
        
        return $this->redirectToRoute('usuarios_extranet');
    }

    private function getAllExtranetUsers(){
        $usuariosExtranet = $this->forward('App\Controller\KeycloakFullApiController::getUsers', [
            'realm' => $this->getParameter('keycloack_extranet_realm')
        ]);

        $usuarios = json_decode($usuariosExtranet->getContent(), TRUE);
        return $usuarios;
    }
}
