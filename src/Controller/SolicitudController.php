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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpClient\HttpClient;

class SolicitudController extends AbstractController
{
    private $keycloak;
    
    public function __construct(KeycloakApiSrv $keycloak){
    	$this->keycloak = $keycloak;
    }


    #[Route('/dashboard/nueva-solicitud', name: 'nueva-solicitud')]
    public function nuevaSolicitud(Request $request, MailerInterface $mailer): Response
    {
        $solicitud = new Solicitud;

        $form = $this->createForm(NuevaSolicitudType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            //Verifica si ya existe una solicitud activa
            if ($this->verificarSolicitud($solicitud) == true){
                return $this->redirectToRoute('dashboard');
            }

            //verifica persona física y/o jurídica preexistente            
            $personaFisica = $entityManager->getRepository(PersonaFisica::class)->findOneBy(['cuitCuil' => $solicitud->getCuil()]);
            $personaJuridica = $entityManager->getRepository(PersonaJuridica::class)->findOneBy(['cuit' => $solicitud->getCuit()]);
            
            if ($personaFisica){
                $solicitud->setPersonaFisica($personaFisica);
            }

            if($personaJuridica){
                $solicitud->setPersonaJuridica($personaJuridica);
            }
            
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

            $this->addFlash('success', 'Invitación creada con éxito. Se ha enviado un email a ' . $solicitud->getMail() . ' con instrucciones para completar el registro.');
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
     * @Route("dashboard/solicitud/{hash}/aceptar-solicitud", name="aceptarSolicitud")
     */
    public function aceptarSolicitud($hash): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneByHash($hash);
        
        $solicitud->setFechaAlta(new \DateTime('now'));
        
        $password = substr(md5(uniqid(rand(1,100))), 1, 6);
        //Crea usuario en keycloak y en la tabla usuarios
        $a = $this->crearUsuario($solicitud, $password);

        $a = null;
        

        $entityManager->persist($solicitud);
        $entityManager->flush();
        
        $this->addFlash('success', 'Usuario creado con éxito! Se envió un email a ' . $solicitud->getMail() . ' con los datos de acceso');
        //dd();            
        return $this->redirectToRoute('dashboard');
    }


    private function crearUsuario($solicitud, $password, MailerInterface $mailer) {
        $entityManager = $this->getDoctrine()->getManager();        
        
        $usuarioKeycloak = $this->verificaUsuarioPreexistente($solicitud->getPersonaFisica()->getCuitCuil());
        if ($usuarioKeycloak) {
            $usuario = $entityManager->getRepository('App\Entity\User')->encontrarPorKeycloakId($usuarioKeycloak->id);
            $solicitud->setUsuario($usuario[0]);
            $entityManager->persist($solicitud);
        } else {

/*             if(empty($this->keycloak->getUserByUsernameAndRealm($solicitud->getPersonaFisica()->getCuitCuil(),$this->getParameter('keycloak_realm')))){

            } */

            $data=$this->keycloak->postUsuario(
                $solicitud->getPersonaFisica()->getCuitCuil(),
                $solicitud->getMail(),
                $solicitud->getPersonaFisica()->getNombres(),
                $solicitud->getPersonaFisica()->getApellido(),
                $password,
                'true',
                $this->getParameter('keycloak_extranet_realm')
            );
            
            if ($data->getStatusCode() == 500 ) {
                $this->addFlash('danger', 'Hubo un error, la operación no pudo completarse');
                        
                return $this->redirectToRoute('dashboard');
            }

            $usuarioKeycloak = $this->keycloak->getUserByUsernameAndRealm($solicitud->getPersonaFisica()->getCuitCuil(), $this->getParameter('keycloak_extranet_realm'));

            $usuario = new User;
            $usuario->setPersonaFisica($solicitud->getPersonaFisica());
            $usuario->setUsername($solicitud->getPersonaFisica()->getCuitCuil());
            //TODO: crear registros REALM en la tabla (ver esta línea de acá abajo)
            //$usuario->setRealm($this->getParameter('keycloak_extranet_realm'));
            $usuario->setEmail($solicitud->getMail());
            //TODO: Ver el tema de los roles en algún futuro
            $usuario->setRoles(['ROLE_USER']);
            //Si el password no se setea en blanco, por default toma nulo. Si es nulo va a tirar error al loguear en el extra.
            $usuario->setPassword('');
            //TODO: ver el keycloakId
            $usuario->setKeycloakId($usuarioKeycloak->id);

            $entityManager->persist($usuario);
            //Envia mail con los datos de acceso
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
        }
        $entityManager->flush();

        return;
    }

    /**
     * 9 escenarios posibles: (habrán más?)     
     * --------------------- 
     * 1) Nueva solicitud de un usuario nuevo (no existe el usuario ni el dispositivo)
     * 2) Nueva solicitud de un usuario que ya existe (existe el usuario no existe el dispositivo)
     * 3) Solicitud ya aprobada con el mismo nicname (Existe el usuario, existe el dispositivo y hay una relación entre ambos)
     * 4) Solicitud rechazada con el mismo nicname (Existe el usuario, existe el dispositivo y hay una relación entre ambos)
     * 5) Solicitud vencida
     * 6) Solicitud activa sin que el usuario haya enviado los datos
     * 7) Solicitud activa con los datos ya enviados por el usuario (falta la aprobación o el rechazo de la misma)
     * 8) existe el usuario y el dispositivo y no existe la relación
     * 9) no existe el usuario existe el dispositivo
     * 
     */
    private function verificarSolicitud($solicitud){
        $entityManager = $this->getDoctrine()->getManager();

        $solicitudActiva = $entityManager->getRepository('App\Entity\Solicitud')->findSolicitudActiva($solicitud->getMail(), $solicitud->getNicname());
        if ($solicitudActiva){
            $this->addFlash('danger', 'Existe una solicitud activa con esos datos. (La persona con CUIT ' . $solicitud->getCuil() . ' aún no envió los datos solicitados)');
            return true;
        } else {
            return false;
        }
        //TODO: verificar más escenarios
    }

    private function verificaUsuarioPreexistente($username){
        $res = $this->keycloak->getUserByUsernameAndRealm(
            $username,
            $this->getParameter('keycloak_extranet_realm')
        );
        
        return json_decode($res->getContent());
    }

}
