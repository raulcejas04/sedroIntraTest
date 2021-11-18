<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ChangePasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\KeycloakFullApiController;
use Symfony\Component\Validator\Constraints\All;

class ChangePasswordController extends AbstractController
{
    #[Route('/dashboard/change/password', name: 'change_password')]
    public function index(Request $request)
    {
        $form = $this->createForm(ChangePasswordType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $this->getUser()->getKeycloakId();
            $realm = $this->getParameter('keycloak_realm');
            $dataForm = $request->request->all();
            $password = $dataForm['change_password']['password']['first'];
            
            $this->forward('App\Controller\KeycloakFullApiController::resetPasswordUser', [
                'id' => $id,
                'realm' => $this->getParameter('keycloak_extranet_realm'),
                'password' => $password
            ]);
            $exito = $this->forward('App\Controller\KeycloakFullApiController::changeUserPassword', [
                'id' => $id, 
                'realm' => $realm, 
                'password' => $password
            ]);
            if ($exito->getStatusCode() == 500) {
                $this->addFlash('warning', 'No fue posible actualizar la contraseña');                
            } else {
                $this->addFlash('success', 'Contraseña cambiada con éxito!');
            }
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('change_password/changePassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
