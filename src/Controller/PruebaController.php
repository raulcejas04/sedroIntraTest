<?php

namespace App\Controller;

use App\Entity\Prueba;
use App\Form\PruebaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruebaController extends AbstractController
{
    #[Route('/pruebas-de-inputs', name: 'prueba')]
    public function index(Request $request): Response    
    {
        $prueba = new Prueba;
        $form = $this->createForm(PruebaType::class, $prueba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prueba);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('prueba/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
