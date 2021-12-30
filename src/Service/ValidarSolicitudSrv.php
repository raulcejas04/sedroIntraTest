<?php

namespace App\Service;

use App\Entity\UsuarioDispositivo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp;
use App\Service\KeycloakApiSrv;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\AuxSrv;

class ValidarSolicitudSrv extends AbstractController
{
    private $client;
    private $parameterBag;
    private $kc;
    private $em;
    private $auxSrv;
    private $sendAlertsSrv;

    public function __construct(ParameterBagInterface $parameterBag, KeycloakApiSrv $kc, EntityManagerInterface $em, SendAlertsSrv $sendAlertsSrv, AuxSrv $auxSrv)
    {
        $this->client = new GuzzleHttp\Client();
        $this->parameterBag = $parameterBag;
        $this->kc = $kc;
        $this->em = $em;
        $this->sendAlertsSrv = $sendAlertsSrv;
        $this->auxSrv = $auxSrv;
    }

    //public function validarSolicitud($solicitud){
    // public function validarSolicitud($personaFisica, $personaJuridica, $dispositivo, $usuario, $usuarioDispositivo, $ambiente = 'Intranet', $paso = '1')
    public function validarSolicitud($solicitud, $ambiente = 'Intranet', $paso = '1')
    {

        $personaFisica = $this->em->getRepository('App:PersonaFisica')->findOneBy(['cuitCuil' => $solicitud->getCuit()]);
        $personaJuridica = $this->em->getRepository('App:PersonaJuridica')->findOneBy(['cuit' => $solicitud->getCuil()]);
        $dispositivo =  $this->em->getRepository('App:Dispositivo')->findOneBy(['nicname' => $solicitud->getNicname()]);
        $usuario =  $this->em->getRepository('App:User')->findOneBy(['username' => $solicitud->getCuit()]);
        $usuarioDispositivo = $this->em->getRepository('App:UsuarioDispositivo')->findOneBy(["usuario" => $usuario, "dispositivo" => $dispositivo]);


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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            //TODO: verificar si es Pastor Joao, Pastor Jimenez o Jony de ese dispositivo
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('error', 'La persona ' . $personaFisica->getNombre() . ' ' . $personaFisica->getApellido() . ' ya está vinculado a ese dispositivo. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('solicitudes');
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            $this->addFlash('error', 'La persona ' . $personaFisica->getNombre() . ' ' . $personaFisica->getApellido() . ' ya está vinculado a ese dispositivo. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('solicitudes');
                            break;
                    }

                    break;
            }

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $datos = [
                                'personaFisica' => $personaFisica,
                                'personaJuridica' => $personaJuridica,
                                'dispositivo' => $dispositivo,
                                'usuario' => $usuario,
                                'usuarioDispositivo' => $usuarioDispositivo,
                                'ambiente' => $ambiente,
                                'paso' => $paso,
                            ];
                            return $datos;
                            break;
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $datos = [
                                'personaFisica' => $personaFisica,
                                'personaJuridica' => $personaJuridica,
                                'dispositivo' => $dispositivo,
                                'usuario' => $usuario,
                                'usuarioDispositivo' => null,
                                'ambiente' => $ambiente,
                                'paso' => $paso,
                            ];
                            return $datos;
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            $usuarioDispositivo = new UsuarioDispositivo();
                            $usuarioDispositivo->setUsuario($usuario);
                            $usuarioDispositivo->setDispositivo($dispositivo);
                            $usuarioDispositivo->setFechaAlta(new \DateTime());
                            $usuarioDispositivo->setFechaBaja(null);

                            $this->em->persist($usuarioDispositivo);
                            $this->em->flush();

                            $this->addFlash('info', 'El usuario, la persona física, la persona jurídica y el dispositivo existían con anterioridad.');
                            $this->addFlash('success', 'Se ha vinculado el usuario ' . $usuario->getPersonaFisica()->getNombres() . ' ' . $usuario->getPersonaFisica()->getApellido() . '(' . $usuario->getUsername() . ')' . ' a ' . $dispositivo->getNicname());
                            return $this->redirectToRoute('solicitudes');
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('3');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;

                        case '2':
                            $datos = [
                                'personaFisica' => $personaFisica,
                                'personaJuridica' => $personaJuridica,
                                'dispositivo' => $dispositivo,
                                'usuario' => null,
                                'usuarioDispositivo' => null,
                                'ambiente' => $ambiente,
                                'paso' => $paso,
                            ];
                            return $datos;
                            break;

                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $datos = [
                                'personaFisica' => $personaFisica,
                                'personaJuridica' => $personaJuridica,
                                'dispositivo' => $dispositivo,
                                'usuario' => $usuario,
                                'usuarioDispositivo' => $usuarioDispositivo,
                                'ambiente' => $ambiente,
                                'paso' => $paso,
                            ];
                            return $datos;
                            break;

                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;

                        case '3':
                            //Crea un nuevo usuario de Extranet en KC, en la DB y envía un email con los datos de acceso
                            $this->AuxSrv->createKeycloakcAndDatabaseUser($personaFisica, $solicitud, 'Extranet');
                            

                            break;
                    }

                    break;
            }

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('7');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('9');

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
            $this->accionesSobreInconsistencias('10');

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
            $this->accionesSobreInconsistencias('11');

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
            $this->accionesSobreInconsistencias('12');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('15');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('17');

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
            $this->accionesSobreInconsistencias('18');

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
            $this->accionesSobreInconsistencias('19');

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
            $this->accionesSobreInconsistencias('20');

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
            $this->accionesSobreInconsistencias('21');

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
            $this->accionesSobreInconsistencias('22');

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
            $this->accionesSobreInconsistencias('23');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

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
            $this->accionesSobreInconsistencias('25');

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
            $this->accionesSobreInconsistencias('26');

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
            $this->accionesSobreInconsistencias('27');

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
            $this->accionesSobreInconsistencias('28');

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
            $this->accionesSobreInconsistencias('29');

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
            $this->accionesSobreInconsistencias('30');

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
            $this->accionesSobreInconsistencias('31');

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            # code...
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $hash = md5(uniqid(rand(), true));
                            $solicitud->setHash($hash);     
                            $this->addFlash('danger', 'Escenario # 32: Paso uno.');           
                            break;
                        case '2':
                            $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');                      case '2':
                            return $this->redirectToRoute('dashboard');
                            break;
                        case '3':
                            # code...
                            break;
                    }

                    break;
            }

            return $solicitud;

         //   return $this->redirectToRoute('dashboard');
        }

        $this->addFlash('danger', 'Ningún escenario se cumple');

        switch ($ambiente) {
            case 'Extranet':
                switch ($paso) {
                    case '1':
                        # code...
                        break;
                    case '2':
                        # code...
                        break;
                    case '3':
                        # code...
                        break;
                }
                # code...
                break;
            case 'Intranet':
                switch ($paso) {
                    case '1':
                        # code...
                        break;
                    case '2':
                        $this->addFlash('error', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                        break;
                    case '3':
                        # code...
                        break;
                }
        }

        return $this->redirectToRoute('dashboard');
    }

    private function accionesSobreInconsistencias($escenario)
    {
        $this->sendAlertsSrv->sendBadStageAlertToSuperAdmins($escenario);
        $this->addFlash('danger', 'Escenario # ' . $escenario . ' con inconsistencias. Se ha comunicado a soporte');
        return $this->redirectToRoute('dashboard');
        //enviar un email a todos los superadministradores
    }
}
