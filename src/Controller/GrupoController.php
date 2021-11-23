<?php

namespace App\Controller;

use App\Entity\Grupo;
use App\Form\GrupoType;
use App\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/grupo')]
class GrupoController extends AbstractController
{
    #[Route('/', name: 'grupo_index', methods: ['GET'])]
    public function index(GrupoRepository $grupoRepository): Response
    {
        return $this->render('grupo/index.html.twig', [
            'grupos' => $grupoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'grupo_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $grupo = new Grupo();
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newKeycloakGroup = $this->forward('App\Controller\KeycloakFullApiController::createKeycloakGroupInRealm', [
                'realm' => $this->getParameter('keycloak_realm'),
                'name' => $grupo->getNombre(),
            ]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grupo);
            //$entityManager->flush();

            return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo/new.html.twig', [
            'grupo' => $grupo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'grupo_show', methods: ['GET'])]
    public function show(Grupo $grupo): Response
    {
        return $this->render('grupo/show.html.twig', [
            'grupo' => $grupo,
        ]);
    }

    #[Route('/{id}/edit', name: 'grupo_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Grupo $grupo): Response
    {
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo/edit.html.twig', [
            'grupo' => $grupo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'grupo_delete', methods: ['POST'])]
    public function delete(Request $request, Grupo $grupo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grupo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grupo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
    }
}
