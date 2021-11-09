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
        $opcionesLateral = $this->getDoctrine()->getManager()->getRepository('App:Menuitem')->itemsMenu( 2 );
        $idActive = '12'; //hardcodeado. Habria que tomar la opcion que actualmente se seleccionó
       
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'opcionesLateral' => $opcionesLateral,
            'opcionActive' => $idActive,
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
            'controller_name' => 'DashboardController',
            'opcionesLateral' => $opcionesLateral,
            'opcionActive' => $idActive,
        ]);
    }
    
    
    
}
