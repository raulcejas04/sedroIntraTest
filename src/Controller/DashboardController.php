<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function index(): Response
    {
        $CODIGO_MENU = 2;
        $entityManager = $this->getDoctrine()->getManager();
        $opcionesLateral = $entityManager->getRepository('App:Menuitem')->findByMenuId( $CODIGO_MENU );
        $idActive = '12'; //hardcodeado. Habria que tomar la opcion que actualmente se seleccionó
       
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'opcionesLateral' => $opcionesLateral,
            'opcionActive' => $idActive,
        ]);
    }
}
