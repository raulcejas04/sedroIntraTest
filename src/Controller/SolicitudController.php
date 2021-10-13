<?php

namespace App\Controller;

use App\Entity\Dispositivo;
use App\Entity\PersonaFisica;
use App\Entity\PersonaJuridica;
use App\Entity\Representacion;
use App\Entity\Solicitud;
use App\Form\NuevaSolicitudType;
use App\Form\RepresentacionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

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
            $url = $this->generateUrl('solicitud-paso-2', ['hash' => $hash], UrlGeneratorInterface::ABSOLUTE_URL);
            $email = (new TemplatedEmail())
            ->from('hello@example.com')
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
    public function pasoDos(Request $request, $hash): Response
    {
        //TODO: Que el invitado solo pueda cargar estos datos una única vez
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App:Solicitud')->findOneByHash($hash);        
        
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

    /**
     * @Route("dashboard/{hash}/generar-usuario", name="generarNuevoUsuario")
     */
    public function pasoTresUno(Request $request): Response
    {
        return $this->render('$0.html.twig', []);
    }

    private function verificarSolicitudPreexistente($solicitud){
        $entityManager = $this->getDoctrine()->getManager();
        //TODO: Verificar el CUIT y/o el CUIL que sean correctos y válidos (Preguntar a Gustavo del algoritmo de verificación)
        $verificarMailExistente = $entityManager->getRepository('App\Entity\Solicitud')->findOneByMail($solicitud->getMail());
        $verificarCuilExistente = $entityManager->getRepository('App\Entity\Solicitud')->findOneByCuil($solicitud->getCuil());
        $verificarCuitExistenet = $entityManager->getRepository('App\Entity\Solicitud')->findOneByCuit($solicitud->getCuit());

        if ($verificarCuilExistente){
            $this->addFlash('danger', 'Existe una solicitud con ese CUIT');
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
