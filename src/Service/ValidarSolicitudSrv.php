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

        $flagOk = false;
        $redirectForError = false;
        $data = null;

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

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            //TODO: verificar si es Pastor Joao, Pastor Jimenez o Jony de ese dispositivo
                            //TODO: Preguntarle a Walter si así se usa lo de Dispositivo Responsable
                            $responsable = $this->em->getRepository('App:DispositivoResponsable')->findOneBy(['dispositivo' => $dispositivo,'personaFisica' => $personaFisica, 'owner' => true]);
                            if ($responsable) {
                                $flagOk = false;
                                $redirectForError = true;
                                $data = null;
                                $solicitud = null;
                                $this->addFlash('danger', 'No se puede continuar con la solicitud, ya que el dispositivo ya tiene asociado a la persona.');
                            } else {
                                $solicitudActiva = $this->em->getRepository('App\Entity\Solicitud')->findSolicitudActiva($solicitud->getMail(), $solicitud->getNicname(), $solicitud->getCuit(), $solicitud->getCuil());
                                if ($solicitudActiva) {
                                    $flagOk = false;
                                    $redirectForError = true;
                                    $data = null;
                                    $solicitud = null;
                                    $this->addFlash('danger', 'No se puede continuar con la solicitud, ya que está activa (esperando datos del invitado).');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                                $this->addFlash('danger', 'No se puede continuar con la solicitud, ya que está activa (esperando datos del invitado).');
                            } else {
                                $flagOk = true;
                                $redirectForError = false;
                                $data = null;
                                $solicitud->setPersonaFisica($personaFisica);
                                $solicitud->setPersonaJuridica($personaJuridica);
                                $solicitud->setDispositivo($dispositivo);
                                $this->addFlash('success', 'Solicitud creada correctamente');
                            }
                            break;

                        case '2':
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            break;

                        case '3':                            
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;
                            $solicitud->setFechaAlta(new \DateTime('now'));
                            $this->addFlash('danger', 'La persona ' . $personaFisica->getNombre() . ' ' . $personaFisica->getApellido() . ' ya está vinculado a ese dispositivo. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if ($personaFisica && $personaJuridica && $dispositivo && $usuario && !$usuarioDispositivo) {
            $this->addFlash('danger', 'Escenario # 2: Trabaja en otro dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

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
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

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
        if ($personaFisica && $personaJuridica && $dispositivo && !$usuario && $usuarioDispositivo) {
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
            $this->addFlash('danger', 'Escenario # 4: Paciente');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                            break;

                        case '3':
                            //Crea un nuevo usuario de Extranet en KC, en la DB y envía un email con los datos de acceso
                            $this->AuxSrv->createKeycloakcAndDatabaseUser($personaFisica, $solicitud, 'Extranet');
                            //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;


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
        if ($personaFisica && $personaJuridica && !$dispositivo && $usuario && $usuarioDispositivo) {
            $this->addFlash('danger', 'Escenario # 5: El usuario existe en otro dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if ($personaFisica && $personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            $this->addFlash('danger', 'Escenario # 6: El usuario existe en otro dispositivo y se da de alta en un dispositivo nuevo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;

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
        if ($personaFisica && $personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
            $salida = $this->accionesSobreInconsistencias('7');
            
            return $salida;
        }

        /**
         * escenario 8:
         * Paso 1: Traer datos
         * Paso 2: Traer datos
         * Paso 3: Traer datos
         * Inicia: Intranet
         * Observaciones: Paciente en un dispositivo nuevo
         */
        if ($personaFisica && $personaJuridica && !$dispositivo && !$usuario && !$usuarioDispositivo) {
            $this->addFlash('danger', 'Escenario # 8: Paciente en un dispositivo nuevo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
                            $flagOk = false;
                            $redirectForError = true;
                            $data = null;
                            $solicitud = null;
                            break;
                        case '2':
                            # code...
                            break;
                        case '3':
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if ($personaFisica && !$personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
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
            $this->addFlash('danger', 'Escenario # 13: INCOSISTENCIA');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if ($personaFisica && !$personaJuridica && !$dispositivo && $usuario && !$usuarioDispositivo) {
            $this->addFlash('danger', 'Escenario # 14: trabaja en otro dispositivo de otra razón social');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if ($personaFisica && !$personaJuridica && !$dispositivo && !$usuario && $usuarioDispositivo) {
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
            $this->addFlash('danger', 'Escenario # 16: alta persona jur, dispositivo, usuario, usuario_dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if (!$personaFisica && $personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
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
            $this->addFlash('danger', 'Escenario # 24: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
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
        if (!$personaFisica && !$personaJuridica && $dispositivo && $usuario && $usuarioDispositivo) {
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
            $this->addFlash('danger', 'Escenario # 32: Alta persona fisica, dispositivo, usuario, usuario_dispositivo');

            switch ($ambiente) {
                case 'Extranet':
                    switch ($paso) {
                        case '1':
                            $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
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
                            $this->addFlash('danger', 'Sin permisos suficientes para aceptar o rechazar una solicitud');
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
                            $flagOk = true;
                            $redirectForError = false;
                            $data = null;                            
                            $this->addFlash('Success', 'Escenario # 32: Paso uno.');
                            break;
                        case '2':
                            $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');                      case '2':
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

            return $solicitud;

         //   return $this->redirectToRoute('dashboard');
        }

        $this->addFlash('danger', 'Ningún escenario se cumple');

        switch ($ambiente) {
            case 'Extranet':
                switch ($paso) {
                    case '1':
                        $this->addFlash('danger', 'Sin permisos suficientes para iniciar una solicitud');
                        $flagOk = false;
                        $redirectForError = true;
                        $data = null;
                        $solicitud = null;
                        //$flagOk = false;
                            //$redirectForError = true;
                            //$data = null;
                            //$solicitud = null;

                        break;
                    case '2':
                        //$flagOk = false;
                        //$redirectForError = true;
                        break;
                    case '3':
                        //$flagOk = false;
                        //$redirectForError = true;
                        break;
                }
                # code...
                break;
            case 'Intranet':
                switch ($paso) {
                    case '1':
                        //$flagOk = false;
                        //$redirectForError = true;
                        break;
                    case '2':
                        $this->addFlash('danger', 'Seccion destinada a invitados en la extranet por solicitud. Si crees que es un error contacta a soporte <a href="{{ path("issue_report_new") }}>haciendo clic aquí y danos un poco de contexto.</a>');
                        //$flagOk = false;
                        //$redirectForError = true;
                        break;
                    case '3':
                        //$flagOk = false;
                        //$redirectForError = true;
                        break;
                }
        }

        $salida = [
            'flagOk' => $flagOk,
            'redirectForError' => $redirectForError,
            'data' => $data,
            'solicitud' => $solicitud,
        ];

        return $salida;        
    }

    private function accionesSobreInconsistencias($escenario)
    {
        $this->sendAlertsSrv->sendBadStageAlertToSuperAdmins($escenario);
        $this->addFlash('danger', 'Escenario # ' . $escenario . ' con inconsistencias. Se ha comunicado a soporte');

        $salida = [
            'flagOk' => false,
            'redirectForError' => true,
            'data' => null,
            'solicitud' => null,
        ];
        
        return $salida;
    }
}
