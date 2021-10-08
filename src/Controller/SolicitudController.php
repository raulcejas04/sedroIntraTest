<?php

namespace App\Controller;

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

class SolicitudController extends AbstractController
{
    #[Route('/nueva-solicitud', name: 'nueva-solicitud')]
    public function nuevaSolicitud(Request $request, MailerInterface $mailer): Response
    {
        $solicitud = new Solicitud;

        $form = $this->createForm(NuevaSolicitudType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //TODO: Verificar el CUIT y/o el CUIL que sean correctos y válidos (Preguntar a Gustavo del algoritmo de verificación)
            //TODO: Verificar que el email y/o CUIT/CUIL no estén repetidos

            //TODO: Este no es el hash solicitado por la documentación: (openssl_encrypt, cifrado 'AES-256-CBC')
            $hash = md5(uniqid(rand(), true));
            $solicitud->setHash($hash);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($solicitud);
            $entityManager->flush();

            $url = $this->generateUrl('solicitud-paso-2', ['hash' => $hash], UrlGeneratorInterface::ABSOLUTE_URL);
            $email = (new Email())
            ->from('hello@example.com')
            ->to($solicitud->getMail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Invitación para dar de alta usuario y dispositivo nuevo')
            //TODO: Enviar email con HTML!            
            ->text('Hola ' . $solicitud->getNicname() . '! Por favor, ingrese a este link ' . $url . ' para completar su solicitud')
            //->html('<p>See Twig integration for better HTML integration!</p>')
            ;

            $mailer->send($email);

            //TODO: Agregar un flashMessage y mostrarlo en el dashboard para hacerlo amigable al usuario
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
        $entityManager = $this->getDoctrine()->getManager();
        $solicitud = $entityManager->getRepository('App:Solicitud')->findOneByHash($hash);

        $representacion = new Representacion;
        $form = $this->createForm(RepresentacionType::class, $representacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($representacion);
            $entityManager->flush();
            //TODO: agregar el flashbag;
            return $this->redirectToRoute('dashboard');
        }

        return $this->renderForm('solicitud/paso2.html.twig', [
            'form' => $form,
            'solicitud' => $solicitud
        ]);
    }
}
