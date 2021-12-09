<?php

namespace App\Controller;

use App\Entity\TipoCuitCuil;
use App\Form\TipoCuitCuilType;
use App\Repository\TipoCuitCuilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TipoDispositivo;
use App\Entity\TipoDocumento;
use App\Form\TipoDispositivoType;
use App\Repository\TipoDispositivoRepository;
use App\Form\TipoDocumentoType;
use App\Repository\TipoDocumentoRepository;
use App\Entity\Grupo;
use App\Form\GrupoType;
use App\Repository\GrupoRepository;
use App\Entity\Sexo;
use App\Form\SexoType;
use App\Repository\SexoRepository;
use App\Entity\Realm;
use App\Form\RealmType;
use App\Repository\RealmRepository;
use App\Entity\Role;
use App\Form\RoleType;
use App\Repository\RoleRepository;

#[Route('/dashboard/super-admines')]
class SuperAdminController extends AbstractController
{

    /**
     * @Route("/", name="ListaSuperAdmin")
     */
    public function listaSuperAdmin()
    {
        $response = $this->render(
            'lista_super_admin/listaSuperAdmin.html.twig',
            []
        );
        return $response;
    }












    /******************************************************************************************
     * REALMS
     ******************************************************************************************/ 
    #[Route('/realm/', name: 'realm_index', methods: ['GET'])]
    public function indexRealm(RealmRepository $realmRepository): Response
    {
        return $this->render('realm/index.html.twig', [
            'realms' => $realmRepository->findAll(),
        ]);
    }

    #[Route('/realm/new', name: 'realm_new', methods: ['GET', 'POST'])]
    public function newRealm(Request $request, EntityManagerInterface $entityManager): Response
    {
        $realm = new Realm();
        $form = $this->createForm(RealmType::class, $realm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*
            $a = $this->forward('App\Controller\KeycloakFullApiController::createKeycloakRealm', [
                'name' => $realm->getRealm(),
            ]);
*/

            $entityManager->persist($realm);
            $entityManager->flush();

            return $this->redirectToRoute('realm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realm/new.html.twig', [
            'realm' => $realm,
            'form' => $form,
        ]);
    }

    #[Route('/realm/{id}', name: 'realm_show', methods: ['GET'])]
    public function showRealm(Realm $realm): Response
    {
        return $this->render('realm/show.html.twig', [
            'realm' => $realm,
        ]);
    }

    #[Route('/realm/{id}/edit', name: 'realm_edit', methods: ['GET', 'POST'])]
    public function editRealm(Request $request, Realm $realm, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RealmType::class, $realm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$entityManager->flush();

            return $this->redirectToRoute('realm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('realm/edit.html.twig', [
            'realm' => $realm,
            'form' => $form,
        ]);
    }

    #[Route('/realm/{id}', name: 'realm_delete', methods: ['POST'])]
    public function deleteRealm(Request $request, Realm $realm, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realm->getId(), $request->request->get('_token'))) {
            $entityManager->remove($realm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('realm_index', [], Response::HTTP_SEE_OTHER);
    }

    /*****************************************************************************************
     * GRUPOS
     *****************************************************************************************/
    #[Route('/grupos', name: 'grupo_index', methods: ['GET'])]
    public function indexGrupo(GrupoRepository $grupoRepository): Response
    {
        return $this->render('grupo/index.html.twig', [
            'grupos' => $grupoRepository->findAll(),
        ]);
    }

    #[Route('/grupos/new', name: 'grupo_new', methods: ['GET','POST'])]
    public function newGrupo(Request $request): Response
    {
        $grupo = new Grupo();
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->forward('App\Controller\KeycloakFullApiController::createKeycloakGroupInRealm', [
                'realm' => $grupo->getRealm()->getRealm(),
                'name' => $grupo->getNombre(),
            ]);
            $this->forward('App\Controller\KeycloakFullApiController::viewKeycloakGroupInRealm', [
                'realm' => $this->getParameter('keycloak_realm'),
                'name' => $grupo->getNombre(),
            ]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grupo);
            $entityManager->flush();

            return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo/new.html.twig', [
            'grupo' => $grupo,
            'form' => $form,
        ]);
    }

    #[Route('/grupos/{id}', name: 'grupo_show', methods: ['GET'])]
    public function showGrupo(Grupo $grupo): Response
    {
        return $this->render('grupo/show.html.twig', [
            'grupo' => $grupo,
        ]);
    }

    #[Route('/grupos/{id}/edit', name: 'grupo_edit', methods: ['GET','POST'])]
    public function editGrupo(Request $request, Grupo $grupo): Response
    {
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grupo/edit.html.twig', [
            'grupo' => $grupo,
            'form' => $form,
        ]);
    }

    #[Route('/grupos/{id}', name: 'grupo_delete', methods: ['POST'])]
    public function deleteGrupo(Request $request, Grupo $grupo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grupo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->remove($grupo);
            //$entityManager->flush();
        }

        return $this->redirectToRoute('grupo_index', [], Response::HTTP_SEE_OTHER);
    }

    /*****************************************************************************************
     * ROLES
     *****************************************************************************************/
    #[Route('/roles/', name: 'role_index', methods: ['GET'])]
    public function indexRoles(RoleRepository $roleRepository): Response
    {
        return $this->render('role/index.html.twig', [
            'roles' => $roleRepository->findAll(),
        ]);
    }

    #[Route('/roles/new', name: 'role_new', methods: ['GET', 'POST'])]
    public function newRoles(Request $request, EntityManagerInterface $entityManager): Response
    {
        $role = new Role();
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($role);
            $entityManager->flush();

            return $this->redirectToRoute('role_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('role/new.html.twig', [
            'role' => $role,
            'form' => $form,
        ]);
    }

    #[Route('/roles/{id}', name: 'role_show', methods: ['GET'])]
    public function showRoles(Role $role): Response
    {
        return $this->render('role/show.html.twig', [
            'role' => $role,
        ]);
    }

    #[Route('/roles/{id}/edit', name: 'role_edit', methods: ['GET', 'POST'])]
    public function editRoles(Request $request, Role $role, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('role_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('role/edit.html.twig', [
            'role' => $role,
            'form' => $form,
        ]);
    }

    #[Route('/roles/{id}', name: 'role_delete', methods: ['POST'])]
    public function deleteRoles(Request $request, Role $role, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$role->getId(), $request->request->get('_token'))) {
            $entityManager->remove($role);
            $entityManager->flush();
        }

        return $this->redirectToRoute('role_index', [], Response::HTTP_SEE_OTHER);
    }

    










    /*****************************************************************************************
    * TIPO CUIL CUIT
    ******************************************************************************************/ 
    #[Route('/tipo/cuil-cuit/', name: 'tipo_cuilcuit_index', methods: ['GET'])]
    public function index(TipoCuitCuilRepository $tipoCuitCuilRepository): Response
    {
        return $this->render('tipos/index.html.twig', [
            'tipo_cuit_cuils' => $tipoCuitCuilRepository->findAll(),
        ]);
    }

    #[Route('/tipo/cuil-cuit/new', name: 'tipos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tipoCuitCuil = new TipoCuitCuil();
        $form = $this->createForm(TipoCuitCuilType::class, $tipoCuitCuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tipoCuitCuil);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_cuilcuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipos/new.html.twig', [
            'tipo_cuit_cuil' => $tipoCuitCuil,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/cuil-cuit/{id}', name: 'tipos_show', methods: ['GET'])]
    public function show(TipoCuitCuil $tipoCuitCuil): Response
    {
        return $this->render('tipos/show.html.twig', [
            'tipo_cuit_cuil' => $tipoCuitCuil,
        ]);
    }

    #[Route('/tipo/cuil-cuit/{id}/edit', name: 'tipos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TipoCuitCuil $tipoCuitCuil, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TipoCuitCuilType::class, $tipoCuitCuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tipo_cuilcuit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipos/edit.html.twig', [
            'tipo_cuit_cuil' => $tipoCuitCuil,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/cuil-cuit/{id}', name: 'tipos_delete', methods: ['POST'])]
    public function delete(Request $request, TipoCuitCuil $tipoCuitCuil, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoCuitCuil->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tipoCuitCuil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_cuilcuit_index', [], Response::HTTP_SEE_OTHER);
    }

    /*****************************************************************************************
    * TIPO DISPOSITIVO
    ******************************************************************************************/    
    #[Route('/tipo/dispositivo', name: 'tipo_dispositivo_index', methods: ['GET'])]
    public function indexTipoDisp(TipoDispositivoRepository $tipoDispositivoRepository): Response
    {
        return $this->render('tipo_dispositivo/index.html.twig', [
            'tipo_dispositivos' => $tipoDispositivoRepository->findAll(),
        ]);
    }

    #[Route('/tipo/dispositivo/new', name: 'tipo_dispositivo_new', methods: ['GET', 'POST'])]
    public function newTipoDisp(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tipoDispositivo = new TipoDispositivo();
        $form = $this->createForm(TipoDispositivoType::class, $tipoDispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tipoDispositivo);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_dispositivo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_dispositivo/new.html.twig', [
            'tipo_dispositivo' => $tipoDispositivo,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/dispositivo/{id}', name: 'tipo_dispositivo_show', methods: ['GET'])]
    public function showTipoDisp(TipoDispositivo $tipoDispositivo): Response
    {
        return $this->render('tipo_dispositivo/show.html.twig', [
            'tipo_dispositivo' => $tipoDispositivo,
        ]);
    }

    #[Route('/tipo/dispositivo/{id}/edit', name: 'tipo_dispositivo_edit', methods: ['GET', 'POST'])]
    public function editTipoDisp(Request $request, TipoDispositivo $tipoDispositivo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TipoDispositivoType::class, $tipoDispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tipo_dispositivo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_dispositivo/edit.html.twig', [
            'tipo_dispositivo' => $tipoDispositivo,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/dispositivo/{id}/delete', name: 'tipo_dispositivo_delete', methods: ['POST'])]
    public function deleteTipoDisp(Request $request, TipoDispositivo $tipoDispositivo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoDispositivo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tipoDispositivo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_dispositivo_index', [], Response::HTTP_SEE_OTHER);
    }

    /*****************************************************************************************
    * TIPO DOCUMENTO
    ******************************************************************************************/
    #[Route('/tipo/documento', name: 'tipo_documento_index', methods: ['GET'])]
    public function indexTipoDoc(TipoDocumentoRepository $tipoDocumentoRepository): Response
    {
        return $this->render('tipo_documento/index.html.twig', [
            'tipo_documentos' => $tipoDocumentoRepository->findAll(),
        ]);
    }

    #[Route('/tipo/documento/new', name: 'tipo_documento_new', methods: ['GET', 'POST'])]
    public function newTipoDoc(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tipoDocumento = new TipoDocumento();
        $form = $this->createForm(TipoDocumentoType::class, $tipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tipoDocumento);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_documento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_documento/new.html.twig', [
            'tipo_documento' => $tipoDocumento,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/documento/{id}', name: 'tipo_documento_show', methods: ['GET'])]
    public function showTipoDoc(TipoDocumento $tipoDocumento): Response
    {
        return $this->render('tipo_documento/show.html.twig', [
            'tipo_documento' => $tipoDocumento,
        ]);
    }

    #[Route('/tipo/documento/{id}/edit', name: 'tipo_documento_edit', methods: ['GET', 'POST'])]
    public function editTipoDoc(Request $request, TipoDocumento $tipoDocumento, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TipoDocumentoType::class, $tipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tipo_documento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_documento/edit.html.twig', [
            'tipo_documento' => $tipoDocumento,
            'form' => $form,
        ]);
    }

    #[Route('/tipo/documento/{id}/delete', name: 'tipo_documento_delete', methods: ['POST'])]
    public function deleteTipoDoc(Request $request, TipoDocumento $tipoDocumento, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoDocumento->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tipoDocumento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_documento_index', [], Response::HTTP_SEE_OTHER);
    }




    /*****************************************************************************************
     * Sexo
     *****************************************************************************************/
    #[Route('/tipos/sexo', name: 'sexo_index', methods: ['GET'])]
    public function indexSexo(SexoRepository $sexoRepository): Response
    {
        return $this->render('sexo/index.html.twig', [
            'sexos' => $sexoRepository->findAll(),
        ]);
    }

    #[Route('/tipos/sexo/new', name: 'sexo_new', methods: ['GET','POST'])]
    public function newSexo(Request $request): Response
    {
        $sexo = new Sexo();
        $form = $this->createForm(SexoType::class, $sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sexo);
            $entityManager->flush();

            return $this->redirectToRoute('sexo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sexo/new.html.twig', [
            'sexo' => $sexo,
            'form' => $form,
        ]);
    }

    #[Route('/tipos/sexo/{id}', name: 'sexo_show', methods: ['GET'])]
    public function showSexo(Sexo $sexo): Response
    {
        return $this->render('sexo/show.html.twig', [
            'sexo' => $sexo,
        ]);
    }

    #[Route('/tipos/sexo/{id}/edit', name: 'sexo_edit', methods: ['GET','POST'])]
    public function editSexo(Request $request, Sexo $sexo): Response
    {
        $form = $this->createForm(SexoType::class, $sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sexo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sexo/edit.html.twig', [
            'sexo' => $sexo,
            'form' => $form,
        ]);
    }

    #[Route('/tipos/sexo/{id}', name: 'sexo_delete', methods: ['POST'])]
    public function deleteSexo(Request $request, Sexo $sexo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sexo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sexo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sexo_index', [], Response::HTTP_SEE_OTHER);
    }

}
