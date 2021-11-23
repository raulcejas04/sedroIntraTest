<?php

namespace App\Controller;

use App\Entity\RolKeycloak;
use App\Form\RolKeycloakType;
use App\Repository\RolKeycloakRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rol/keycloak')]
class RolKeycloakController extends AbstractController
{
    #[Route('/', name: 'rol_keycloak_index', methods: ['GET'])]
    public function index(RolKeycloakRepository $rolKeycloakRepository): Response
    {
        return $this->render('rol_keycloak/index.html.twig', [
            'rol_keycloaks' => $rolKeycloakRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'rol_keycloak_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $rolKeycloak = new RolKeycloak();
        $form = $this->createForm(RolKeycloakType::class, $rolKeycloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rolKeycloak);
            $entityManager->flush();

            return $this->redirectToRoute('rol_keycloak_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rol_keycloak/new.html.twig', [
            'rol_keycloak' => $rolKeycloak,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rol_keycloak_show', methods: ['GET'])]
    public function show(RolKeycloak $rolKeycloak): Response
    {
        return $this->render('rol_keycloak/show.html.twig', [
            'rol_keycloak' => $rolKeycloak,
        ]);
    }

    #[Route('/{id}/edit', name: 'rol_keycloak_edit', methods: ['GET','POST'])]
    public function edit(Request $request, RolKeycloak $rolKeycloak): Response
    {
        $form = $this->createForm(RolKeycloakType::class, $rolKeycloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rol_keycloak_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rol_keycloak/edit.html.twig', [
            'rol_keycloak' => $rolKeycloak,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rol_keycloak_delete', methods: ['POST'])]
    public function delete(Request $request, RolKeycloak $rolKeycloak): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rolKeycloak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rolKeycloak);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rol_keycloak_index', [], Response::HTTP_SEE_OTHER);
    }
}
