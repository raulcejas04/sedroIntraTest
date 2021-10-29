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
use App\Controller\KeyCloakFullApiController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpClient\HttpClient;

class SolicitudController extends AbstractController
{
    #[Route('/dashboard/nueva-solicitud', name: 'nueva-solicitud')]
    public function nuevaSolicitud(Request $request, MailerInterface $mailer): Response
    {
        $solicitud = new Solicitud;

        $form = $this->createForm(NuevaSolicitudType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            //Verifica si ya existe una solicitud con el Cuit, Cuil o Mail
            if ($this->verificarSolicitudPreexistente($solicitud) == true){
                return $this->redirectToRoute('dashboard');
            }
            
            //TODO: Este no es el hash solicitado por la documentación: (openssl_encrypt, cifrado 'AES-256-CBC')
            $hash = md5(uniqid(rand(), true));
            $solicitud->setHash($hash);
            
            $entityManager->persist($solicitud);
            $entityManager->flush();

            //TODO: Verificar que el email se haya enviado sin errores
            //TODO: ¿Crear una funcion privada para enviar emails en este controller?
            $url = $this->getParameter('extranet_url') . '/solicitud/' . $solicitud->getHash() . '/completar-datos';
            $email = (new TemplatedEmail())
            ->from($this->getParameter('direccion_email_salida'))
            ->to($solicitud->getMail())
            ->subject('Invitación para dar de alta usuario y dispositivo nuevo')            
            ->htmlTemplate('emails/invitacionPasoUno.html.twig')
            ->context([
                'nicname' => $solicitud->getNicname(),
                'url' => $url
            ])
            ;

            $mailer->send($email);

            $this->addFlash('success', 'Invitación creada con éxito!');
            return $this->redirectToRoute('dashboard');
        }

        return $this->renderForm('solicitud/index.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("nueva-solicitud/{hash}/completar", name="solicitud-paso-2")
     */
    /*
     public function pasoDos(Request $request, $hash): Response
    {        
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App:Solicitud')->findOneByHash($hash);
        if ($solicitud->getUsada() == true){
            $this->addFlash('danger', 'Ya ha ingresado los datos anteriormente para ésta solicitud');
            //TODO: que redirija al home cuando el mismo esté listo
            return $this->redirectToRoute('dashboard');
        }
        
        $representacion = new Representacion;
        
        //todo esto de acá abajo hasta el $form es para que el formulario se renderice con datos en readonly
        $personaFisica = new PersonaFisica;
        $personaJuridica = new PersonaJuridica;        
        $dispositivo = new Dispositivo;

        $dispositivo->setNicname($solicitud->getNicname());
        
        $representacion->setPersonaFisica($personaFisica);
        $representacion->getPersonaFisica()->setCuitCuil($solicitud->getCuil());
        
        $representacion->setPersonaJuridica($personaJuridica);
        $representacion->getPersonaJuridica()->setCuit($solicitud->getCuit());
        
        $representacion->getPersonaJuridica()->getDispositivos()->add($dispositivo);
        
        $form = $this->createForm(RepresentacionType::class, $representacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $solicitud->setPersonaFisica($representacion->getPersonaFisica());
            $solicitud->setPersonaJuridica($representacion->getPersonaJuridica());
            $solicitud->setFechaUso(new \DateTime('now'));
            $solicitud->setDispositivo($dispositivo);
            $solicitud->setUsada(true);
            
            $dispositivo->setPersonaJuridica($personaJuridica);

            $entityManager->persist($representacion);            
            $entityManager->persist($solicitud);
            $entityManager->persist($dispositivo);
            $entityManager->flush();
            
            $this->addFlash('success', 'Datos completados con éxito!');

            //TODO: Que el redirectToRoute vaya al home cuando el mismo esté listo
            return $this->redirectToRoute('dashboard');
        }

        return $this->renderForm('solicitud/paso2.html.twig', [
            'form' => $form,
            'solicitud' => $solicitud
        ]);
    }
    */

    /**
     * @Route("dashboard/{hash}/generar-usuario", name="generarNuevoUsuario")
     */
    /*
     public function pasoCuatroUno(Request $request, $hash): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        //$solicitud = $entityManager->getRepository('App:Solicitud')->findOneByHash($hash);

        
        /*
        * Hay que seguir este tutorial.
        * https://www.appsdeveloperblog.com/keycloak-rest-api-create-a-new-user/
        */
       
        /*
        $client = new CurlHttpClient();

        //TODO: La URL de keycloak esta hardcodeada... debemos hacer una variable con la misma y llamarla aquí
        $response = $client->request('POST', 'http://localhost:8180/auth/realms/master/protocol/openid-connect/token', [
            'headers' => [
                'Connection' => 'keep-alive',
                'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            'body' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'admin-cli',
                'client_secret' => 'e98435b1-0982-4c07-bdd2-ca292fe8f8bf'
            ],
        ]);

        $token = $response->getContent();
        $accessToken = json_decode($token);
        
        //$this->addFlash('success', 'Nuevo usuario creado con éxito! se ha enviado un email a la casilla ' . $solicitud->getMail() . ' con los datos de acceso');
        return $this->redirectToRoute('dashboard');
    }
    */









    /**
     * @Route("dashboard/solicitudes", name="solicitudes")
     */
    public function solicitudes(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitudes = $entityManager->getRepository('App\Entity\Solicitud')->findAll();

        $response = $this->renderView('solicitud\solicitudes.html.twig', [
            'solicitudes' => $solicitudes
        ]);
        return new Response($response);
    }

    /**
     * @Route("solicitud/{hash}/ver", name="verSolicitud")
     */
    public function verSolicitud($hash): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneByHash($hash);

        $response = $this->renderView('solicitud\verSolicitud.html.twig', [
            'solicitud' => $solicitud
        ]);
        return new Response($response);
    }

    /**
     * @Route("dashboard/solicitud/{hash}/aceptada", name="aceptarSolicitud")
     */
    public function aceptarSolicitud($hash, MailerInterface $mailer): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneByHash($hash);
        
        $solicitud->setFechaAlta(new \DateTime('now'));
        
        $entityManager->persist($solicitud);
        $entityManager->flush();

        //Crea usuario en keycloak
        //TODO: Crear usuario en el keycloak de la EXTANET! (ahora está en la intranet para probar)
        $password = substr(md5(uniqid(rand(1,6))), 1, 6);
        $this->crearUsuario($solicitud, $password);

        //Envía un email
        //TODO: Enviar, en el email, la URL para que el usuario pueda ingresar con sus datos
        $url = $this->getParameter('extranet_url');
        $email = (new TemplatedEmail())            
            ->from($this->getParameter('direccion_email_salida'))
            ->to($solicitud->getMail())
            ->subject('Solicitud aprobada: Datos de acceso')            
            ->htmlTemplate('emails/invitacionPasoTres.html.twig')
            ->context([
                'nicname' => $solicitud->getNicname(),
                'user' => $solicitud->getPersonaFisica()->getCuitCuil(),
                'password' => $password,
                'url' => $url
            ])
            ;

        $mailer->send($email);
        
        $this->addFlash('success', 'Usuario creado con éxito! Se envió un email a ' . $solicitud->getMail() . ' con los datos de acceso');
                    
        return $this->redirectToRoute('dashboard');
    }


    private function crearUsuario($solicitud, $password) {
        
        $data = $this->forward('App\Controller\KeycloakFullApiController::postUsuario', [
            'username'  => $solicitud->getPersonaFisica()->getCuitCuil(),
            'email' => $solicitud->getMail(),
            'firstname'  => $solicitud->getPersonaFisica()->getNombres(),
            'lastname' => $solicitud->getPersonaFisica()->getApellido(),
            'password' => $password,
            'temporary' => 'true',
            'realm' => $this->getParameter('keycloack_extranet_realm')
        ]); 
        
        if ($data->getStatusCode() == 500 ) {
            $this->addFlash('danger', 'Hubo un error, la operación no pudo completarse');
                    
            return $this->redirectToRoute('dashboard');
        }

        return;
    }

    private function verificarSolicitudPreexistente($solicitud){
        $entityManager = $this->getDoctrine()->getManager();
        //TODO: Verificar el CUIT y/o el CUIL que sean correctos y válidos (Preguntar a Gustavo del algoritmo de verificación)
        $verificarMailExistente = $entityManager->getRepository('App\Entity\Solicitud')->findOneByMail($solicitud->getMail());
        $verificarCuilExistente = $entityManager->getRepository('App\Entity\Solicitud')->findOneByCuil($solicitud->getCuil());
        $verificarCuitExistenet = $entityManager->getRepository('App\Entity\Solicitud')->findOneByCuit($solicitud->getCuit());

        if ($verificarCuilExistente){
            $this->addFlash('danger', 'Existe una solicitud con ese CUIL');
        }

        if ($verificarCuitExistenet){
            $this->addFlash('danger', 'Existe una solicitud con ese CUIL');
        }

        if ($verificarMailExistente) {
            $this->addFlash('danger', 'Existe una solicitud con esa dirección de Email');
        }

        if ($verificarMailExistente || $verificarCuilExistente || $verificarCuitExistenet){
            return true;
        } else {
            return false;
        }
    }
}
