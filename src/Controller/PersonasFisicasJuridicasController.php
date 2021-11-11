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

        $pfs = $entityManager->getRepository('App:PersonaFisica')->findAll();        

        return $this->render('personas_fisicas_juridicas/lista.html.twig', [
            'pfs' => $pfs,
        ]);
    }
}
