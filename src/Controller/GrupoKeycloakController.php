<?php

namespace App\Controller;

use App\Entity\GrupoKeycloak;
use App\Form\GrupoKeycloakType;
use App\Repository\GrupoKeycloakRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Grupo;
use App\Controller\KeycloakFullApiController;

#[Route('/grupo/keycloak')]
class GrupoKeycloakController extends AbstractController
{
    public function __construct(KeycloakFullApiController $keycloak){
    	$this->keycloak = $keycloak;
    }

    #[Route('/', name: 'grupo_keycloak_index', methods: ['GET'])]
    public function index(GrupoKeycloakRepository $grupoKeycloakRepository): Response
    {
        return $this->render('grupo_keycloak/index.html.twig', [
            'grupo_keycloaks' => $grupoKeycloakRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'grupo_keycloak_new', methods: ['GET','POST'])]
    public function newExtranetKeycloakGroup(Request $request): Response
    {
        $grupoKeycloak = new GrupoKeycloak();
        $form = $this->createForm(GrupoKeycloakType::class, $grupoKeycloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newKeycloakGroup = $this->keycloak->createKeycloakGroupInRealm($this->getParameter('keycloak_realm'),$grupoKeycloak->getNombre());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grupoKeycloak);
            //$entityManager->flush();

            return $this->redirectToRoute('grupo_keycloak_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo_keycloak/new.html.twig', [
            'grupo_keycloak' => $grupoKeycloak,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'grupo_keycloak_show', methods: ['GET'])]
    public function show(GrupoKeycloak $grupoKeycloak): Response
    {
        return $this->render('grupo_keycloak/show.html.twig', [
            'grupo_keycloak' => $grupoKeycloak,
        ]);
    }

    #[Route('/{id}/edit', name: 'grupo_keycloak_edit', methods: ['GET','POST'])]
    public function edit(Request $request, GrupoKeycloak $grupoKeycloak): Response
    {
        $form = $this->createForm(GrupoKeycloakType::class, $grupoKeycloak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grupo_keycloak_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo_keycloak/edit.html.twig', [
            'grupo_keycloak' => $grupoKeycloak,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'grupo_keycloak_delete', methods: ['POST'])]
    public function delete(Request $request, GrupoKeycloak $grupoKeycloak): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grupoKeycloak->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grupoKeycloak);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grupo_keycloak_index', [], Response::HTTP_SEE_OTHER);
    }
}
