<?php

namespace App\Controller;

use App\Entity\Prueba;
use App\Form\PruebaType;
use App\Form\PruebagusType;
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
            $entityManager = $this->getDoctrine()->findById();
            $entityManager->persist($prueba);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('prueba/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/testflash', name: 'testflash')]
    public function testflash(): Response
    {
        $opcionesLateral = $this->getDoctrine()->getManager()->getRepository('App:Menuitem')->itemsMenu( 2 );
        $idActive = '12'; //hardcodeado. Habria que tomar la opcion que actualmente se seleccionó
       
        //--- coloca 2 mensajes de cada tipo
        $listaBanners=array('success','warning','danger','info');
        foreach ($listaBanners as $v){
            $this->addFlash($v, 'Primer mensajex!');
            $this->addFlash($v, 'Segundo mensajex!');
        }
        
        return $this->render('dashboard/index.html.twig', [
            'opcionesLateral' => $opcionesLateral,
            'opcionActive' => $idActive,
        ]);
    }    

    
    #[Route('/pruebagus', name: 'pruebagus')]
    public function pruebagus(Request $request): Response    
    {
        $prueba = new Prueba;
        $form = $this->createForm(PruebagusType::class, $prueba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->findById();
            $entityManager->persist($prueba);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('prueba/pruebagus.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
