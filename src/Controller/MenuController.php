<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{

    #[Route('/menu', name: 'menu')]
    public function index(): Response
    {
        $MENU_ID = 1; //// HARDCODEADO PARA PROBAR
        $ROLE_ID = 2; //// HARDCODEADO ROLE

        $user = 'rcejas';

        $isLogued = true;
        $items = array();

        $entityManager = $this->getDoctrine()->getManager();
        $menues = $entityManager->getRepository('App:Menuitem')->findAllByMenuYRole($MENU_ID, $ROLE_ID);

        foreach ($menues as $menu){
            $items[$menu['parent_id'] == null? 0: $menu['parent_id']][] = array(
                  'id' => $menu['id'],
                  'nombre' => $menu["name"],
                  'activo' => $menu['active'],
                  'icon' => $menu['icon'],
                  'divider' => $menu['divider'],
                  'orden' => $menu['orderlist'] == null? 0: $menu['orderlist'],
                  'link' => $menu['link'],
                  'route' => $menu['action'], 
                  'parentId' => $menu['parent_id'] == null? 0: $menu['parent_id']
                );
        }

        $aux = array();
        foreach ($items as $id => $item)
        {                        
            $aux[$id] = $this->orderMultiDimensionalArray($item, 'orden');
        }

        $isLogued = true;

        $view['alertcount'] = 0;
        $view['items'] = $aux;
        $view['isLogued'] = $isLogued;
        $view['user'] = $user;

        return $this->render('menu/index.html.twig', $view);
    }

    #[Route('/sidebarcontrol', name: 'sidebarcontrol')]
    public function sidebarcontrol(): Response
    {
        //$USER_ID = $this->getUser()->getPersonaFisica->getId();
        $USER_ID = 1;
        //echo "UserID : {$USER_ID}";

        $entityManager = $this->getDoctrine()->getManager();
        $view['listaDispositivos'] = $entityManager->getRepository('App:Dispositivo')->findByPersonaFisica($USER_ID);
        
        return $this->render('menu/sidebarcontrol.html.twig', $view);
    }

    
    function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {  
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {  
                $position[$key]  = $row[$field];  
                $newRow[$key] = $row;  
        }
        if ($inverse){
            arsort($position);
        }else{
            asort($position);
        }
        $returnArray = array();  
        foreach ($position as $key => $pos) {       
            $returnArray[] = $newRow[$key];  
        }  
        return $returnArray;  
    }

}
