<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController {

    #[Route('/misDatos', name: 'misDatos')]
    public function verMisDatos(): Response {
        //TODO: hacer esto desde el security.yml
        if (!$this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }
        return $this->render('usuario/misDatos.html.twig');
    }

}
