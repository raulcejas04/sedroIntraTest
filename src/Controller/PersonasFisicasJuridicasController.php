<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard')]
class PersonasFisicasJuridicasController extends AbstractController
{
    #[Route('/personas/lista', name: 'listaPersonas')]
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $personasFisicas = $entityManager->getRepository('App:PersonaFisica')->findAll();
        $personasJuridicas = $entityManager->getRepository('App:PersonaJuridica')->findAll();
        $dispositivos = $entityManager->getRepository('App:Dispositivo')->findAll();
        $usuarios = $entityManager->getRepository('App:User')->findAll();
        return $this->render('personas_fisicas_juridicas/index.html.twig', [
            'personasFisicas' => $personasFisicas,
            'personasJuridicas' => $personasJuridicas,
            'dispositivos' => $dispositivos,
            'usuarios' => $usuarios,
        ]);
    }
}
