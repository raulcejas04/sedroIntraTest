<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp;
use App\Service\KeycloakApiSrv;

class ValidarSolicitudSrv extends AbstractController
{
    private $client;
    private $parameterBag;
    private $kc;

    public function __construct(ParameterBagInterface $parameterBag, KeycloakApiSrv $kc) {
        $this->client = new GuzzleHttp\Client();
        $this->parameterBag = $parameterBag;
        $this->kc = $kc;
    }

    //public function validarSolicitud($solicitud){
    public function validarSolicitud($personaFisica, $personaJuridica, $dispositivo, $usuario, $usuarioDispositivo){
        /*
        $entityManager = $this->getDoctrine()->getManager();

        $personaFisica = $entityManager->getRepository('App:PersonaFisica')->findOneBy(['cuitCuil' => $solicitud->getCuit()]);
        $personaJuridica = $entityManager->getRepository('App:PersonaJuridica')->findOneBy(['cuit' => $solicitud->getCuil()]);
        $dispositivo = $entityManager->getRepository('App:Dispositivo')->findOneBy(['nicname' => $solicitud->getNicname()]);
        $usuario = $entityManager->getRepository('App:Usuario')->findOneBy(['username' => $solicitud->getUsername()]);

        if ($usuario && $dispositivo) {
            
            $usuarioDispositivo = $entityManager->getRepository('App:UsuarioDispositivo')->findOneBy(['usuario' => $usuario, 'dispositivo' => $dispositivo]);
            if (!$usuarioDispositivo) {               
                $usuarioDispositivo = false;
            }
        } else {
            $usuarioDispositivo = false;
        }
        */

        
        /**
         * escenario 1:
         * Paso 1: Error no deja seguir si está vigente
         * Paso 2: 
         * Paso 3:
         * Inicia: Extranet
         * Observaciones: Error si no expiró
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == true && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario #1: Error no deja seguir si está vigente');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 2:
         * Paso 1: traer los datos
         * Paso 2: traer los datos
         * Paso 3: alta usuario_dispositivo
         * Inicia: Extranet
         * Observaciones: Trabaja en otro dispositivo
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == true && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 2: Trabaja en otro dispositivo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 3: INCONSISTENCIA
         * Paso 1: Sino existe el usuario, usuario_dispositivo no existe
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == true && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 3: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 4:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Usuario
         * Inicia: Extranet
         * Observaciones: Paciente
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == true && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 4: Paciente');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 5:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Dispositivo
         * Inicia: Intranet
         * Observaciones: El usuario existe en otro dispositivo
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == false && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 5: El usuario existe en otro dispositivo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 6:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Dispositivo y usuario_dispositivo
         * Inicia: Intranet
         * Observaciones: El usuario existe en otro dispositivo y se da de alta en un dispositivo nuevo
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == true && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 6: El usuario existe en otro dispositivo y se da de alta en un dispositivo nuevo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 7: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == false && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 7: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 8:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Traer datos
         * Inicia: Intranet
         * Observaciones: Paciente en un dispositivo nuevo
         */
        if ($personaFisica == true && $personaJuridica == true && $dispositivo == false && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 8: Paciente en un dispositivo nuevo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 9: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == true && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 9: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 10: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == true && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 10: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 11: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == true && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 11: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 12: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == true && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 12: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 13: INCOSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == false && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 13: INCOSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 14:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: alta persona jurídica, dispositivo, usuario dispositivo
         * Inicia: Intranet
         * Observaciones: trabaja en otro dispositivo de otra razón social
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == false && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 14: trabaja en otro dispositivo de otra razón social');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 15: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == false && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 15: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 16:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: alta persona jur, dispositivo, usuario, usuario_dispositivo
         * Inicia: Intranet
         * Observaciones:
         */
        if ($personaFisica == true && $personaJuridica == false && $dispositivo == false && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 16: alta persona jur, dispositivo, usuario, usuario_dispositivo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 17: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == true && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 17: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 18: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == true && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 18: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 19: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == true && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 19: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 20: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == true && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 20: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 21: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == false && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 21: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 22: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == false && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 22: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 23: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == false && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 23: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 24: 
         * Paso 1: Traer datos Persona Jurídica
         * Paso 2: Traer datos
         * Paso 3: Alta persona fisica, dispositivo, usuario, usuario_dispositivo
         * Inicia: Intranet
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == true && $dispositivo == false && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 24: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 25: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == true && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 25: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 26: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == true && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 26: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 27: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == true && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 27: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 28: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == true && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 28: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 29: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == false && $usuario == true && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 29: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 30: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == false && $usuario == true && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 30: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 31: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == false && $usuario == false && $usuarioDispositivo == true) {
            $this->addFlash('danger', 'Escenario # 31: INCONSISTENCIA');
            return $this->redirectToRoute('dashboard');
            
        }

        /**
         * escenario 32:
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia: Intranet
         * Observaciones:
         */
        if ($personaFisica == false && $personaJuridica == false && $dispositivo == false && $usuario == false && $usuarioDispositivo == false) {
            $this->addFlash('danger', 'Escenario # 32: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');
            return $this->redirectToRoute('dashboard');
            
        }

        $this->addFlash('danger', 'Ningún escenario se cumple');
        return $this->redirectToRoute('dashboard');

    }

    private function asd() {
        
    }

}