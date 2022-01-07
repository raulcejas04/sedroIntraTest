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
use App\Entity\DispositivoResponsable;
use App\Entity\User;
use App\Entity\Realm;
use App\Form\RechazarSolicitudType;
use App\Form\ReenviarEmailType;
use App\Service\ValidarSolicitudSrv;
use DateTime;
use Proxies\__CG__\App\Entity\Menu;
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

class SolicitudController extends AbstractController
{
    private $keycloak;
    private $validador;

    public function __construct(KeycloakApiSrv $keycloak, UrlGeneratorInterface $router, ValidarSolicitudSrv $validador)
    {
        $this->keycloak = $keycloak;
        $this->router = $router;
        $this->validador = $validador;
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
            if ($this->verificarSolicitud($solicitud) == true) {
                return $this->redirectToRoute('dashboard');
            }

            $validacion = $this->validador->validarSolicitud($solicitud, $this->getParameter('keycloak_realm'), Solicitud::PASO_UNO);
            if (!$validacion["flagOk"]) {
                $this->addFlash('danger', $validacion["message"]);
                return $this->redirectToRoute('dashboard');
            }

            $solicitud = $validacion["solicitud"];
            $entityManager->persist($solicitud);
            $entityManager->flush();          
            $this->addFlash('success', $validacion["message"]);
            return $this->redirectToRoute('dashboard');
        }

        return $this->renderForm('solicitud/index.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("dashboard/solicitudes", name="solicitudes")
     */
    public function solicitudes(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
/*         $solicitudes = $entityManager->getRepository('App\Entity\Solicitud')->findBy([
            "fechaEliminacion" => null
        ]);
        dd($solicitudes); */
        $realm = $entityManager->getRepository(Realm::class)->findOneBy(['realm'=>$this->getParameter('keycloak_realm')]);
        $solicitudes = $entityManager->getRepository('App\Entity\Solicitud')->findSolicitudes($realm);
        //dd($solicitudes);
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

        //TODO: Validar acceso(Realm, usuarioDispositivo)

        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneBy([
            "hash" => $hash,
            "fechaEliminacion" => null
        ]);

        if (!$solicitud) {
            $this->addFlash('danger', 'La solicitud no existe.');
            return $this->redirectToRoute('solicitudes');
        }

        $response = $this->renderView('solicitud\verSolicitud.html.twig', [
            'solicitud' => $solicitud,
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
        $validacion = $this->validador->validarSolicitud($solicitud, $this->getParameter('keycloak_realm'), Solicitud::PASO_TRES);
        if (!$validacion["flagOk"]) {
            $this->addFlash('danger', $validacion["message"]);
            return $this->redirectToRoute('dashboard');
        }
        $solicitud = $validacion["solicitud"];
        $entityManager->persist($solicitud);
        $entityManager->flush();
        $this->addFlash('success', $validacion["message"]);
        return $this->redirectToRoute('dashboard');
    }

    #[Route('/dashboard/solicitud/{hash}/reenviar-email', name: 'solicitud_reenviarEmail')]
    public function reenviarCorreo(Request $request, $hash, MailerInterface $mailer): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneByHash($hash);

        if (!$solicitud) {
            $this->addFlash('danger', 'La solicitud no se encuentra o no existe');
            return new JsonResponse([
                "status" => "error",
                "html" => $this->renderView('modales/flashAlertsModal.html.twig')
            ]);
        }

        if ($solicitud->getFechaUso()) {
            $this->addFlash('danger', 'Los datos de la solicitud ya han sido completados.');
            return new JsonResponse([
                "status" => "error",
                "html" => $this->renderView('modales/flashAlertsModal.html.twig')
            ]);
        }

        $form = $this->createForm(ReenviarEmailType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $url = $this->getParameter('extranet_url') . '/public/' . $solicitud->getHash() . '/completar-datos';
            $email = (new TemplatedEmail())
                ->from($this->getParameter('direccion_email_salida'))
                ->to($solicitud->getMail())
                ->subject('Invitación para dar de alta usuario y dispositivo nuevo')
                ->htmlTemplate('emails/invitacionPasoUno.html.twig')
                ->context([
                    'nicname' => $solicitud->getNicname(),
                    'url' => $url
                ]);

            $mailer->send($email);

            return new JsonResponse([
                "status" => "success",
                "message" => "Email reenviado con éxito. Se ha enviado un email a " . $solicitud->getMail() . " con instrucciones para completar el registro."
            ]);
        }

        return new JsonResponse([
            "status" => "success",
            "html" => $this->renderView('modales/reenviarEmailModal.html.twig', [
                'solicitud' => $solicitud,
                'formReenviarCorreo' => $form->createView()
            ])
        ]);
    }

    #[Route('/dashboard/solicitud/{hash}/rechazar-solicitud', name: 'solicitud_rechazar')]
    public function rechazarSolicitud(Request $request, $hash, MailerInterface $mailer): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App\Entity\Solicitud')->findOneByHash($hash);

        if (!$solicitud) {
            $this->addFlash('danger', 'La solicitud no se encuentra o no existe');
            return new JsonResponse([
                "status" => "error",
                "html" => $this->renderView('modales/flashAlertsModal.html.twig')
            ]);
        }

        if ($solicitud->getFechaAlta()) {
            $this->addFlash('danger', 'No se puede rechazar la solicitud porque ya fue dada de alta.');
            return new JsonResponse([
                "status" => "error",
                "html" => $this->renderView('modales/flashAlertsModal.html.twig')
            ]);
        }

        $form = $this->createForm(RechazarSolicitudType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $solicitud->setAceptada(false);
            $solicitud->setCorrecion(false);
            $email = (new TemplatedEmail())
                ->from($this->getParameter('direccion_email_salida'))
                ->to($solicitud->getMail())
                ->subject('Solicitud de invitación rechazada')
                ->htmlTemplate('emails/rechazoSolicitud.html.twig')
                ->context([
                    'solicitud' => $solicitud
                ]);

            $mailer->send($email);

            $entityManager->persist($solicitud);
            $entityManager->flush();

            return new JsonResponse([
                "status" => "success",
                "message" => "Solicitud rechazada correctamente. Se ha enviado un correo a " . $solicitud->getMail() . " con el motivo del rechazo."
            ]);
        }

        return new JsonResponse([
            "status" => "success",
            "html" => $this->renderView('modales/rechazarSolicitudModal.html.twig', [
                'solicitud' => $solicitud,
                'formRechazarSolicitud' => $form->createView()
            ])
        ]);
    }


    public function verificar($solicitud, $password, $mailer)
    {

        $usuarioKeycloak = $this->verificaUsuarioKeycloakPreexistente($solicitud->getPersonaFisica()->getCuitCuil(), $solicitud->getMail());
        $usuarioDb = $this->verificaUsuarioDbPreexistente($solicitud->getPersonaFisica()->getCuitCuil(), $solicitud->getMail());

        $escenario = array(
            'usuarioKeycloak' => $usuarioKeycloak,
            'usuarioDb' => $usuarioDb
        );

        return $escenario;
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
    private function verificarSolicitud($solicitud)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $solicitudActiva = $entityManager->getRepository('App\Entity\Solicitud')->findSolicitudActiva($solicitud->getMail(), $solicitud->getNicname(), $solicitud->getCuit(), $solicitud->getCuil());
        if ($solicitudActiva) {
            $this->addFlash('danger', 'Existe una solicitud activa con esos datos. (La persona con CUIT ' . $solicitud->getCuil() . ' aún no envió los datos solicitados)');
            return true;
        } else {
            return false;
        }
        //TODO: verificar más escenarios
    }

    private function verificaUsuarioKeycloakPreexistente($username, $email)
    {
        $keycloakUsername = $this->keycloak->getUserByUsernameAndRealm(
            $username,
            $this->getParameter('keycloak_extranet_realm')
        );

        $keycloakEmail = $this->keycloak->getUserByEmailAndRealm(
            $email,
            $this->getParameter('keycloak_extranet_realm')
        );

        if (!empty($keycloakUsername) || !empty($keycloakEmail)) {
            return true;
        } else {
            return false;
        }
    }

    private function verificaUsuarioDbPreexistente($username, $email)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $usuarioUsername = $entityManager->getRepository('App\Entity\User')->findOneByUsername($username);
        $usuarioEmail = $entityManager->getRepository('App\Entity\User')->findOneByEmail($email);
        if ($usuarioUsername || $usuarioEmail) {
            return true;
        } else {
            return false;
        }
    }

    private function crearUsuarioKeycloak($solicitud, $password)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data = $this->keycloak->postUsuario(
            $solicitud->getPersonaFisica()->getCuitCuil(),
            $solicitud->getMail(),
            $solicitud->getPersonaFisica()->getNombres(),
            $solicitud->getPersonaFisica()->getApellido(),
            $password,
            'true',
            $this->getParameter('keycloak_extranet_realm')
        );

        if ($data->getStatusCode() == 500) {
            $this->addFlash('danger', 'Hubo un error, la operación no pudo completarse');
            return $this->redirectToRoute('dashboard');
        }

        $usuarioKeycloak = $this->keycloak->getUserByUsernameAndRealm(
            $solicitud->getPersonaFisica()->getCuitCuil(),
            $this->getParameter('keycloak_extranet_realm')
        );

        return $usuarioKeycloak;
    }

    private function crearUsuarioDb($solicitud, $usuarioKeycloak)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $realm = $entityManager->getRepository(Realm::class)->findOneBy(["realm" => $this->getParameter('keycloak_extranet_realm')]);

        $usuario = new User();
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
        $entityManager->flush();

        return $usuario;
    }
}
