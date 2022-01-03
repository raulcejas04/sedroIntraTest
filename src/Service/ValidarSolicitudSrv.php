<?php

namespace App\Service;

use App\Entity\Dispositivo;
use App\Entity\DispositivoResponsable;
use App\Entity\UsuarioDispositivo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GuzzleHttp;
use App\Service\KeycloakApiSrv;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\AuxSrv;
use DateTime;

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

        $flagOk = false;
        $redirectForError = false;
        $data = null;
        $message = "";

        //PARA PROPOSITOS DE PRUEBA
        $debugMode = true;

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
        if ($personaFisica && $personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 1 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //TODO: verificar si es Pastor Joao, Pastor Jimenez o Jony de ese dispositivo
                            //TODO: Preguntarle a Walter si así se usa lo de Dispositivo Responsable
                            $responsable = $this->em->getRepository('App:DispositivoResponsable')->findOneBy(['dispositivo' => $dispositivo, 'personaFisica' => $personaFisica, 'owner' => true, 'fechaBaja' => null]);
                            if ($responsable) {
                                $flagOk = false;
                                $redirectForError = true;
                                $data = null;
                                $solicitud = null;
                                $message = 'No se puede continuar con la solicitud, ya que el dispositivo ya tiene asociado a la persona.';
                            } else {
                                $solicitudActiva = $this->em->getRepository('App\Entity\Solicitud')->findSolicitudActiva($solicitud->getMail(), $solicitud->getNicname(), $solicitud->getCuit(), $solicitud->getCuil());
                                if ($solicitudActiva) {
                                    $flagOk = false;
                                    $redirectForError = true;
                                    $data = null;
                                    $solicitud = null;
                                    $message = 'No se puede continuar con la solicitud, ya que está activa (esperando datos del invitado).';
                                } else {
                                    $flagOk = true;
                                    $redirectForError = false;
                                    $data = null;
                                    $solicitud->setPersonaFisica($personaFisica);
                                    $solicitud->setPersonaJuridica($personaJuridica);
                                    $solicitud->setDispositivo($dispositivo);
                                }
                            }

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $solicitudActiva = $this->em->getRepository('App\Entity\Solicitud')->findSolicitudActiva($solicitud->getMail(), $solicitud->getNicname(), $solicitud->getCuit(), $solicitud->getCuil());
                            if ($solicitudActiva) {
                                $flagOk = false;
                                $redirectForError = true;
                                $data = null;
                                $solicitud = null;
                                $message = 'No se puede continuar con la solicitud, ya que está activa (esperando datos del invitado).';
                            } else {
                                $flagOk = true;
                                $redirectForError = false;
                                $data = null;
                                $solicitud->setPersonaFisica($personaFisica);
                                $solicitud->setPersonaJuridica($personaJuridica);
                                $solicitud->setDispositivo($dispositivo);
                                $message = 'Solicitud creada correctamente';
                            }
                            break;

                        case '2':
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            break;

                        case '3':
                            $flagOk = false;
                            $redirectForError = false;
                            $data = null;
                            $solicitud->setFechaAlta(new \DateTime('now'));
                            $message = 'La persona ' . $personaFisica->getNombres() . ' ' . $personaFisica->getApellido() . ' ya está vinculado a ese dispositivo. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 2:
         * Paso 1: traer los datos
         * Paso 2: traer los datos
         * Paso 3: alta usuario_dispositivo
         * Inicia: Extranet
         * Observaciones: Trabaja en otro dispositivo
         */
        if ($personaFisica && $personaJuridica && $dispositivo && $usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 2: Trabaja en otro dispositivo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 2 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            $flahOk = true;
                            $redirectForError = false;
                            $data = [
                                'personaFisica' => $personaFisica,
                                'personaJuridica' => $personaJuridica,
                                'dispositivo' => $dispositivo,
                                'usuario' => $usuario,
                                'usuarioDispositivo' => $usuarioDispositivo,
                                'ambiente' => $ambiente,
                                'paso' => $paso,
                            ];
                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
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
                            //return $datos;
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $this->auxSrv->createUsuarioDispositivo($dispositivo, $usuario);
                            $message = 'El usuario, la persona física, la persona jurídica y el dispositivo existían con anterioridad.';
                            $message .= 'Se ha vinculado el usuario ' . $usuario->getPersonaFisica()->getNombres() . ' ' . $usuario->getPersonaFisica()->getApellido() . '(' . $usuario->getUsername() . ')' . ' a ' . $dispositivo->getNicname();

                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }
        }

        /**
         * escenario 3: INCONSISTENCIA
         * Paso 1: Sino existe el usuario, usuario_dispositivo no existe
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && $personaJuridica && $dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 3 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('3');

            return $salida;
        }

        /**
         * escenario 4:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Usuario
         * Inicia: Extranet
         * Observaciones: Paciente
         */
        if ($personaFisica && $personaJuridica && $dispositivo && !$usuario && !$usuarioDispositivo) {
            // $this->addFlash('danger', 'Escenario # 4: Paciente');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 4 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
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
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            //return $datos;
                            break;

                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

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
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            //return $datos;
                            break;

                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;

                        case '3':
                            //Crea un nuevo usuario de Extranet en KC, en la DB y envía un email con los datos de acceso
                            $this->auxSrv->createKeycloakcAndDatabaseUser($personaFisica, $solicitud, 'Extranet');
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;


                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 5:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Dispositivo
         * Inicia: Intranet
         * Observaciones: El usuario existe en otro dispositivo
         */
        if ($personaFisica && $personaJuridica && !$dispositivo && $usuario && $usuarioDispositivo) {
            // $this->addFlash('danger', 'Escenario # 5: El usuario existe en otro dispositivo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 5 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 6:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Alta Dispositivo y usuario_dispositivo
         * Inicia: Intranet
         * Observaciones: El usuario existe en otro dispositivo y se da de alta en un dispositivo nuevo
         */
        if ($personaFisica && $personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 6: El usuario existe en otro dispositivo y se da de alta en un dispositivo nuevo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 6 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message =  'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $hash = md5(uniqid(rand(), true));
                            $solicitud->setHash($hash);
                            $solicitud->setPersonaFisica($personaFisica);
                            $solicitud->setPersonaJuridica($personaJuridica);
                            $solicitud->setUsuario($usuario);
                            $this->auxSrv->EnviarCorreoInvitacion($solicitud);
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;
                            $message = 'Invitación generada correctamente.';
                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '3':
                            $this->auxSrv->createDispositivoAndUserDispositivo($solicitud);
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;
                            $message = "Invitación aceptada correctamente. El usuario, la persona física y la persona jurídica existían con anterioridad.<br/>";
                            $message .= "Se ha creado el Dispositivo y se ha relacionado el usuario responsable con exito.";
                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 7: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && $personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 7 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('7');

            return $salida;
        }

        /**
         * escenario 8:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Traer datos
         * Inicia: Intranet
         * Observaciones: Alta de Dispositivo, Usuario y UsuarioDispositivo
         */
        if ($personaFisica && $personaJuridica && !$dispositivo && !$usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 8: Paciente en un dispositivo nuevo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 8 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $this->auxSrv->createKeycloakcAndDatabaseUser($personaFisica, $solicitud, 'Extranet');
                            $this->auxSrv->createDispositivoAndUserDispositivo($solicitud);
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;
                            $message = "Dispositivo y Usuario creados correctamente.";
                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 9: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 9 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('9');

            return $salida;
        }

        /**
         * escenario 10: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && $dispositivo && $usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 10 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('10');

            return $salida;
        }

        /**
         * escenario 11: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && $dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 11 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('11');

            return $salida;
        }

        /**
         * escenario 12: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && $dispositivo && !$usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 12 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('12');

            return $salida;
        }

        /**
         * escenario 13: INCOSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && !$dispositivo && $usuario && $usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 13: INCOSISTENCIA');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 13 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 14:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: alta persona jurídica, dispositivo, usuario dispositivo
         * Inicia: Intranet
         * Observaciones: trabaja en otro dispositivo de otra razón social
         */
        if ($personaFisica && !$personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 14: trabaja en otro dispositivo de otra razón social');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 14 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 15: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 15 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('15');

            return $salida;
        }

        /**
         * escenario 16:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: alta persona jur, dispositivo, usuario, usuario_dispositivo
         * Inicia: Intranet
         * Observaciones:
         */
        if ($personaFisica && !$personaJuridica && !$dispositivo && !$usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 16: alta persona jur, dispositivo, usuario, usuario_dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 17: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 17 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('17');

            return $salida;
        }

        /**
         * escenario 18: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && $dispositivo && $usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 18 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('18');

            return $salida;
        }

        /**
         * escenario 19: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && $dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 19 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('19');

            return $salida;
        }

        /**
         * escenario 20: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && $dispositivo && !$usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 20 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('20');

            return $salida;
        }

        /**
         * escenario 21: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && !$dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 21 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('21');

            return $salida;
        }

        /**
         * escenario 22: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 22 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('22');

            return $salida;
        }

        /**
         * escenario 23: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 23 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('23');

            return $salida;
        }

        /**
         * escenario 24: 
         * Paso 1: Traer datos Persona Jurídica
         * Paso 2: Traer datos
         * Paso 3: Alta persona fisica, dispositivo, usuario, usuario_dispositivo
         * Inicia: Intranet
         * Observaciones:
         */
        if (!$personaFisica && $personaJuridica && !$dispositivo && !$usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 24: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 24 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                    }

                    break;
            }

            //return $this->redirectToRoute('dashboard');
        }

        /**
         * escenario 25: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 25 - Paso: ' . $paso . ' - Ambiente: ' . $ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('25');

            return $salida;
        }

        /**
         * escenario 26: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && $dispositivo && $usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 26 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('26');

            return $salida;
        }

        /**
         * escenario 27: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && $dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 27 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('27');

            return $salida;
        }

        /**
         * escenario 28: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && $dispositivo && !$usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 28 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('28');

            return $salida;
        }

        /**
         * escenario 29: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && !$dispositivo && $usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 29 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('29');

            return $salida;
        }

        /**
         * escenario 30: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 30 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('30');

            return $salida;
        }

        /**
         * escenario 31: INCONSISTENCIA
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia:
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 31 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            $salida = $this->accionesSobreInconsistencias('31');

            return $salida;
        }

        /**
         * escenario 32:
         * Paso 1:
         * Paso 2: 
         * Paso 3:
         * Inicia: Intranet
         * Observaciones:
         */
        if (!$personaFisica && !$personaJuridica && !$dispositivo && !$usuario && !$usuarioDispositivo) {
            //$this->addFlash('danger', 'Escenario # 32: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');
            if ($debugMode) {
                $this->addFlash('success', 'Escenario: 32 - Paso: ' . $paso. ' - Ambiente: '.$ambiente);
            }
            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $message = 'Sin permisos suficientes para iniciar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $message = 'Sin permisos suficientes para aceptar o rechazar una solicitud';
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

                            break;
                    }

                    break;

                case 'Intranet':
                    switch ($paso) {
                        case '1':
                            $hash = md5(uniqid(rand(), true));
                            $solicitud->setHash($hash);
                            $this->auxSrv->EnviarCorreoInvitacion($solicitud);
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;
                            $message = 'Invitación generada correctamente.';
                            break;
                        case '2':
                            $message = 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>';
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;
                        case '3':
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $message = "Ha ocurrido un error.";
                            break;
                    }

                    break;
            }
        }

        $salida = [
            'flagOk' => $flagOk,
            'redirectForError' => $redirectForError,
            'data' => $data,
            'message' => $message,
            'solicitud' => $solicitud,
        ];

        return $salida;
    }

    private function accionesSobreInconsistencias($escenario)
    {
        $this->sendAlertsSrv->sendBadStageAlertToSuperAdmins($escenario);
        $message = 'Escenario # ' . $escenario . ' con inconsistencias. Se ha comunicado a soporte';

        $salida = [
            'flagOk' => false,
            'redirectForError' => true,
            'data' => null,
            'message' => $message,
            'solicitud' => null,
        ];

        return $salida;
    }
}
