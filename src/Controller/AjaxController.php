<?php

namespace App\Controller;


use App\Entity\Dispositivo;
use App\Entity\PersonaFisica;
use App\Entity\PersonaJuridica;
use App\Entity\Representacion;
use App\Entity\Solicitud;
use App\Form\NuevaSolicitudType;
use App\Form\RepresentacionType;
use App\Service\KeycloakApiSrv;
use App\Controller\KeycloakFullApiController;
use App\Entity\User;
use App\Form\ReenviarEmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AjaxController extends AbstractController
{

    #[Route('/ajax/persona_fisica_x_cuit', name: 'get_persona_fisica_x_cuit')]
    public function get_persona_fisica_x_cuit(Request $request ): Response
    {
    	//recibe cuil siempre sin guiones
    	$status = 'Not_Found'; // o 'Error' si hay algún problema, si existe 'Found'
    	$response = array(
            'status' => $status,
            'message' => 'ACA VA LA RAZON SOCIAL'
        );

        return new JsonResponse($response);
  
    }

    #[Route('/ajax/persona_juridica_x_cuit', name: 'get_persona_juridica_x_cuit')]
    public function get_persona_juridica_x_cuit(Request $request ): Response
    {
    	//recibe cuit
    	$status = 'Not_Found'; // o 'Error' si hay algún problema, si existe 'Found'
    	$response = array(
            'status' => $status,
            'message' => 'ACA VA EL NOMBRE'
        );

        return new JsonResponse($response);
  
    }

    #[Route('/ajax/dispositivo', name: 'get_dispositivo')]
    public function get_dispositivo(Request $request ): Response
    {
      	//recibe cuit nicname
    	$status = 'Not_Found'; // o 'Error' si hay algún problema, si existe 'Found'
    	$response = array(
            'status' => $status,
            'message' => 'ACA VA EL NOMBRE'
        );

        return new JsonResponse($response);
  
    }

    #[Route('/ajax/usuario', name: 'get_usuario')]
    public function get_usuario(Request $request ): Response
    {
     	//recibe cuit nicname cuil
    	$status = 'Not_Found'; // o 'Error' si hay algún problema, si existe 'Found'
    	$response = array(
            'status' => $status,
            'message' => 'ACA VA EL NOMBRE'
        );

        return new JsonResponse($response);
  
    }

    #[Route('/ajax/usuario_dispositivo', name: 'get_usuario_dispositivo')]
    public function get_usuario_dispositivo(Request $request ): Response
    {
    	//recibe cuit nicname cuil
    	$status = 'Not_Found'; // o 'Error' si hay algún problema, si existe 'Found'
    	$response = array(
            'status' => $status,
            'message' => 'ACA VA EL NOMBRE'
        );

        return new JsonResponse($response);
  
    }


}
