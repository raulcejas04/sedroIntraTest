<?php

namespace App\Controller;

use App\Entity\Solicitud;
use App\Form\NuevaSolicitudType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SolicitudController extends AbstractController
{
    #[Route('/nueva-solicitud', name: 'nueva-solicitud')]
    public function nuevaSolicitud(Request $request, MailerInterface $mailer): Response
    {
        $solicitud = new Solicitud;

        $form = $this->createForm(NuevaSolicitudType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //TODO: Verificar el CUIT y/o el CUIL que sean correctos y válidos

            //TODO: Este no es el hash solicitado por la documentación: (openssl_encrypt, cifrado 'AES-256-CBC')
            $hash = md5(uniqid(rand(), true));
            $solicitud->setHash($hash);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($solicitud);
            $entityManager->flush();

            $email = (new Email())
            ->from('hello@example.com')
            ->to($solicitud->getMail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Invitación para dar de alta usuario y dispositivo nuevo')
            //TODO: Enviar link para completar el formulario del paso 2 en el email una vez hecho ese paso.
            ->text('Hola ' . $solicitud->getNicname() . '! Por favor, ingrese a este link para completar su solicitud')
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
     * @Route("Route", name="RouteName")
     */
    public function pasoDos(Request $request): Response
    {
        return $this->render('$0.html.twig', []);
    }
}
