<?php

namespace App\Command;


use App\Service\KeycloakApiSrv;
use App\Controller\KeycloakFullApiController;
use App\Entity\Realm;
use App\Entity\Grupo;
use App\Entity\RoleGrupo;
use App\Entity\Role;
use App\Entity\PersonaFisica;
use App\Entity\User;
use App\Entity\UserGrupo;
use App\Entity\Sexo;
use App\Entity\TipoDocumento;
use App\Entity\TipoCuitCuil;
use App\Entity\EstadoCivil;
use App\Entity\Nacionalidad;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\Console\Question\Question;

#[AsCommand(
    name: 'add-super-admin',
    description: 'Agrega el primer Superadministrador para cuando el sistema acaba de ser instalado',    
)]
class AddSuperAdminCommand extends Command
{
    private $em;
    private $kc;

    public function __construct(EntityManagerInterface $em, KeycloakFullApiController $kc) {
        parent::__construct();
        $this->em = $em;
        $this->kc = $kc;
    }
    protected function configure(): void
    {
        $this
                // Descripción corta cuando hacés un "php bin/console list"
            ->setDescription('Agrega el primer Superadministrador para cuando el sistema acaba de ser instalado')
            ->setHelp('Agrega el primer Superadministrador tanto en KC como en la DB para cuando el sistema acaba de ser instalado. Se solicitarán nombre de usuario y contraseña.')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        //Datos de inicio. MUY IMPORTANTES!!!
        $realm = 'Intranet';
        $grupo = 'SuperAdministradores';
        $roleCode = 'ROLE_SUPER_ADMIN';
        $roleName = 'SuperAdministrador';
        $realmDB = null;
        $realmKC = null;
        $grupoDB = null;
        $grupoKC = null;
        $roleDB = null;
        $roleKC = null;
        $roleGrupoKC = null;
        $roleGrupoDB = null;
        $grupoRoleDB = null;
        $grupoRoleKC = null;

        //*********************************************************************
        //********** paso 0, Datos Iniciales **********************************
        //*********************************************************************

        $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findAll();
        if (!$estadoCivil) {
            $output->writeln('<info>No hay tipos de estados civiles difinidos en la base de datos... agregando<info>');
            $estadoCivil1 = new EstadoCivil;
            $estadoCivil1->setEstadoCivil('Soltero/a');
            $this->em->persist($estadoCivil1);

            $estadoCivil2 = new EstadoCivil;
            $estadoCivil2->setEstadoCivil('Casado/a');
            $this->em->persist($estadoCivil2);

            $estadoCivil3 = new EstadoCivil;
            $estadoCivil3->setEstadoCivil('Divorciado/a');
            $this->em->persist($estadoCivil3);

            $estadoCivil4 = new EstadoCivil;
            $estadoCivil4->setEstadoCivil('Viudo/a');
            $this->em->persist($estadoCivil4);
        }
        

        $sexo = $this->em->getRepository(Sexo::class)->findAll();
        if (!$sexo) {
            $output->writeln('<info>No hay sexos definidos en la base de datos... agregando<info>');
            $sexo1 = new Sexo;
            $sexo1->setSexo('M');
            $sexo1->setDescripcion('Masculino');
            $this->em->persist($sexo1);

            $sexo2 = new Sexo;
            $sexo2->setSexo('F');
            $sexo2->setDescripcion('Femenino');
            $this->em->persist($sexo2);

            $sexo3 = new Sexo;
            $sexo3->setSexo('X');
            $sexo3->setDescripcion('No binarie');
            $this->em->persist($sexo3);
        }
        
        $tipoDocumento = $this->em->getRepository(TipoDocumento::class)->findAll();
        if (!$tipoDocumento) {
            $output->writeln('<info>No hay tipos de documentos definidos en la base de datos... agregando<info>');
            $tipoDocumento1 = new TipoDocumento;
            $tipoDocumento1->setTipoDocumento('DNI');
            $this->em->persist($tipoDocumento1);

            $tipoDocumento2 = new TipoDocumento;
            $tipoDocumento2->setTipoDocumento('CUIT');
            $this->em->persist($tipoDocumento2);

            $tipoDocumento3 = new TipoDocumento;
            $tipoDocumento3->setTipoDocumento('Pasaporte');
            $this->em->persist($tipoDocumento3);

            $tipoDocumento4 = new TipoDocumento;
            $tipoDocumento4->setTipoDocumento('Cedula de Identidad');
            $this->em->persist($tipoDocumento4);
        }

        $tipoCuitCuil = $this->em->getRepository(TipoCuitCuil::class)->findAll();
        if (!$tipoCuitCuil) {
            $output->writeln('<info>No hay tipos de CUIT/CUIL definidos en la base de datos... agregando<info>');
            $tipoCuitCuil1 = new TipoCuitCuil;
            $tipoCuitCuil1->setTipoCuitCuil('CUIT');
            $this->em->persist($tipoCuitCuil1);

            $tipoCuitCuil2 = new TipoCuitCuil;
            $tipoCuitCuil2->setTipoCuitCuil('CUIL');
            $this->em->persist($tipoCuitCuil2);
        }

        $nacionalidad = $this->em->getRepository(Nacionalidad::class)->findAll();
        if (!$nacionalidad) {
            $output->writeln('<info>No hay nacionalidades definidas en la base de datos... agregando<info>');
            $nacionalidad1 = new Nacionalidad;
            $nacionalidad1->setPais('Argentina');
            $nacionalidad1->setCodigo('AR');
            $this->em->persist($nacionalidad1);

            $nacionalidad2 = new Nacionalidad;
            $nacionalidad2->setPais('Brasil');
            $nacionalidad2->setCodigo('BR');
            $this->em->persist($nacionalidad2);

            $nacionalidad3 = new Nacionalidad;
            $nacionalidad3->setPais('Chile');
            $nacionalidad3->setCodigo('CL');
            $this->em->persist($nacionalidad3);

            $nacionalidad4 = new Nacionalidad;
            $nacionalidad4->setPais('Colombia');
            $nacionalidad4->setCodigo('CO');
            $this->em->persist($nacionalidad4);

            $nacionalidad5 = new Nacionalidad;
            $nacionalidad5->setPais('Uruguay');
            $nacionalidad5->setCodigo('UY');
            $this->em->persist($nacionalidad5);

            $nacionalidad6 = new Nacionalidad;
            $nacionalidad6->setPais('Venezuela');
            $nacionalidad6->setCodigo('VE');
            $this->em->persist($nacionalidad6);
        }

        
        $output->writeln([                
                '<info>Paso1<info>',
                '',
            ]);
        
        //***************************************************************************
        //********** paso 1, Verificar el realm en KC y en la DB **********************************
        //***************************************************************************
        $escenarioRealm = $this->verificarRealm($realm);
        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmKC'] == true) {
            $output->writeln([                
                '<info>Existe el reaml en la DB y en KC... continuando<info>',
                '',
            ]);
            $realmDB = $this->em->getRepository(Realm::class)->findOneBy(['realm' => $realm]);
            $realmKC = $this->kc->getRealmByName($realm);
        }

        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmKC'] == false) {
            $output->writeln([                
                '<info>Existe el reaml en la DB y no en KC... creando realm en KC<info>',
                '',
            ]);
            $realmDB = $this->em->getRepository(Realm::class)->findOneBy(['realm' => $realm]);
            $realmKC = $this->crearRealmKC();
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmKC'] == true) {
            $output->writeln([                
                '<info>Existe el reaml en KC y no en la DB... creando realm en la DB<info>',
                '',
            ]);
            $realmDB = $this->crearRealmDB();
            $realmKC = $this->kc->getRealmByName($realm);
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmKC'] == false){
            $output->writeln([                
                '<info>No existe el reaml en la DB ni en KC... creando realm en la DB y en KC<info>',
                '',
            ]);
            $realmDB = $this->crearRealmDB();
            $realmKC = $this->crearRealmKC();
        }

        $output->writeln([                
                '<info>Paso2<info>',
                '',
            ]);
        //***************************************************************************
        // paso 2, verificar el Rol ROLE_SUPER_ADMIN en Keycloak y en la DB ***********************
        //***************************************************************************
        $escenarioRol = $this->verificarRol($realm, $grupo, $roleCode, $roleName);
        if ($escenarioRol['roleKC'] == true && $escenarioRol['roleDB'] == true) {
            $output->writeln([                
                '<info>Existe el rol en la DB y en KC... continuando<info>',
                '',
            ]);
            $roleKC = $this->kc->getRoleInRealmbyName($realm, $roleName);
            $roleDB = $this->em->getRepository(Role::class)->findOneBy(['code' => $roleCode]);
        }

	echo "paso21<br>";
        if ($escenarioRol['roleKC'] == true && $escenarioRol['roleDB'] == false) {
            $output->writeln([                
                '<info>Existe el rol en KC y no en la DB... creando rol en la DB<info>',
                '',
            ]);
            $roleKC = $this->kc->getRoleInRealmbyName($realm, $roleName);   
            $roleDB = $this->crearRoleDB($realmDB, $grupoDB, $roleName, $roleCode, $roleKC);
        }

	echo "paso22<br>";
        if ($escenarioRol['roleKC'] == false && $escenarioRol['roleDB'] == true) {
            $output->writeln([                
                '<info>Existe el rol en la DB y no en KC... creando rol en KC<info>',
                '',
            ]);
            $roleKC = $this->crearRoleKC($realm, $grupoKC, $roleCode, $roleName);
            $roleDB = $this->em->getRepository(Role::class)->findOneBy(['code' => $roleCode]);
        }

	echo "paso23<br>";
        if ($escenarioRol['roleKC'] == false && $escenarioRol['roleDB'] == false) {
            $output->writeln([                
                '<info>No existe el rol en la DB ni en KC... creando rol en la DB y KC<info>',
                '',
            ]);
            $roleKC = $this->crearRoleKC($realm, $grupoKC, $roleCode, $roleName);

            $roleDB = $this->crearRoleDB($realmDB, $grupoDB, $roleName, $roleCode, $roleKC);
        }

        $output->writeln([                
                '<info>Paso3<info>',
                '',
            ]);
        
        //***************************************************************************
        //****** paso 3, verificar el grupo en Keycloak y en la DB ********************************
        //***************************************************************************
        $escenarioGrupo = $this->verificarGrupo($realm, $grupo);
        if ($escenarioGrupo['grupoDB'] == true && $escenarioGrupo['grupoKC'] == true) {
            $output->writeln([                
                '<info>Existe el grupo en la DB y en KC... continuando<info>',
                '',
            ]);
            $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(['nombre' => $grupo]);
            $grupoKC = $this->getGroupKC($realm, $grupo) ;
        }

        if ($escenarioGrupo['grupoDB'] == true && $escenarioGrupo['grupoKC'] == false) {
            $output->writeln([                
                '<info>Existe el grupo en la DB y no en KC... creando grupo en KC<info>',
                '',
            ]);
            $grupoKC = $this->crearGrupoKC($realm, $grupo);
            $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(['nombre' => $grupo]);
            
        }

        if ($escenarioGrupo['grupoDB'] == false && $escenarioGrupo['grupoKC'] == true) {
            $output->writeln([                
                '<info>Existe el grupo en KC y no en la DB... creando grupo en la DB<info>',
                '',
            ]);
            $grupoKC = $this->getGroupKC($realm, $grupo) ;
            $grupoDB = $this->crearGrupoDB($realmDB, $grupo, $grupoKC);            
        }

        if ($escenarioGrupo['grupoDB'] == false && $escenarioGrupo['grupoKC'] == false){
            $output->writeln([                
                '<info>No existe el grupo en la DB ni en KC... creando grupo en la DB y en KC<info>',
                '',
            ]);
            $grupoKC = $this->crearGrupoKC($realm, $grupo);
            $grupoDB = $this->crearGrupoDB($realmDB, $grupo, $grupoKC);
        }


        //*************************************************************************
        // paso 4, verificar la relación entre Grupo y Role ***********************
        //*************************************************************************
        $escenarioRoleGrupo = $this->verificarRoleGrupo($realm, $grupoKC, $grupoDB, $roleCode, $roleName, $roleDB);
       
        if ($escenarioRoleGrupo['roleGrupoKC'] == true && $escenarioRoleGrupo['roleGrupoDB'] == true) {
            $output->writeln([                
                '<info>Existe la relación entre grupo y rol en la DB y KC... continuando<info>',
                '',
            ]);
            $roleGrupoKC = $this->kc->getRoleGroupByName($realm, $grupoKC->id, $roleName);
            $roleGrupoDB = $this->em->getRepository(RoleGrupo::class)->findOneBy(['grupo' => $grupoDB, 'role' => $roleDB]);
        }

        if ($escenarioRoleGrupo['roleGrupoKC'] == true && $escenarioRoleGrupo['roleGrupoDB'] == false) {
            $output->writeln([                
                '<info>Existe la relación entre grupo y rol en la DB y no KC... creando relación en la DB<info>',
                '',
            ]);
            $roleGrupoKC = $this->kc->getRoleGroupByName($realm, $grupoKC->id, $roleName);
            $roleGrupoDB = $this->crearRoleGrupoDB($grupoDB, $roleDB);
        }

        if ($escenarioRoleGrupo['roleGrupoKC'] == false && $escenarioRoleGrupo['roleGrupoDB'] == true) {
            $output->writeln([                
                '<info>Existe la relación entre grupo y rol en DB y no en la KC... creando relación en KC<info>',
                '',
            ]);
            $roleGrupoKC = $this->crearRoleGrupoKC($realm, $grupoKC, $roleKC, $roleName, $roleCode);
            $roleGrupoDB = $this->em->getRepository(RoleGrupo::class)->findOneBy(['grupo' => $grupoDB, 'role' => $roleDB]);
        }

        if ($escenarioRoleGrupo['roleGrupoKC'] == false && $escenarioRoleGrupo['roleGrupoDB'] == false) {
            $output->writeln([                
                '<info>No existe la relación entre grupo y rol en la DB ni en KC... creando relación en la DB y KC<info>',
                '',
            ]);
            $roleGrupoKC = $this->crearRoleGrupoKC($realm, $grupoKC, $roleKC, $roleName, $roleCode);
            $roleGrupoDB = $this->crearRoleGrupoDB($grupoDB, $roleDB);

        }

        $output->writeln([                
            '===================================================================================',
            '',
        ]);
        $output->writeln([                
            '',
            '',
        ]);

        $io = new SymfonyStyle($input, $output);
        $helper = $this->getHelper('question');
        $question1 = new Question('Ingrese el número de DNI del nuevo super administrador: ');
        $dni = $helper->ask($input, $output, $question1);

        $personaFisica = $this->em->getRepository(PersonaFisica::class)->findOneBy(['nroDoc' => $dni]);
        if ($personaFisica == null) {
            $output->writeln([
                '',
            ]);
            $question2 = new Question('Ingrese el Nombre del nuevo super administrador: ');
            $nombre = $helper->ask($input, $output, $question2);

            $output->writeln([
                '',
            ]);
            $question3 = new Question('Ingrese el apellido del nuevo super administrador: ');
            $apellido = $helper->ask($input, $output, $question3);

            $output->writeln([
                '',
            ]);
            $question4 = new Question('Ingrese el número de CUIT (con guiones) del nuevo super administrador: ');
            $cuit = $helper->ask($input, $output, $question4);

            $output->writeln([
                '',
            ]);
            $question5 = new Question('Ingrese el sexo del nuevo super administrador, tal como figura en su DNI (Opciones posibles: 1 M, 2 F, 3 X  ');
            $sexo = $helper->ask($input, $output, $question5);
            //$sexo = $this->em->getRepository(Sexo::class)->findOneBy(['id' => $sexo]);

            $output->writeln([
                '',
            ]);
            while ($sexo != 1 && $sexo != 2 && $sexo != 3) {
                $output->writeln([
                    '',
                ]);
                $question5 = new Question('Ingrese el sexo del nuevo super administrador, tal como figura en su DNI (Opciones posibles: 1 M, 2 F, 3 X  ');
                $sexo = $helper->ask($input, $output, $question5);
            }

            switch ($sexo) {
                case '1':
                    $sexo = $this->em->getRepository(Sexo::class)->findOneBy(['sexo' => 'M']);
                    break;
                case '2':
                    $sexo = $this->em->getRepository(Sexo::class)->findOneBy(['sexo' => 'F']);
                    break;
                case '3':
                    $sexo = $this->em->getRepository(Sexo::class)->findOneBy(['sexo' => 'X']);
                    break;
            }
            
            
            //$question6 = new Question('Ingrese el estado Civil del nuevo super administrador (Opciones posibles: 1 Soltero/a, 2 Casado/a, 3 Divorciado/a, 4 Viudo/a  ');
            //$estadoCivil = $helper->ask($input, $output, $question6);
            while ($estadoCivil != 1 && $estadoCivil != 2 && $estadoCivil != 3 && $estadoCivil != 4) {
                $output->writeln([
                    '',
                ]);
                $question6 = new Question('Ingrese el estado Civil del nuevo super administrador (Opciones posibles: 1 Soltero/a, 2 Casado/a, 3 Divorciado/a, 4 Viudo/a  ');
                $estadoCivil = $helper->ask($input, $output, $question6);
            }

            switch ($estadoCivil) {
                case '1':
                    $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findOneBy(['estadoCivil' => 'Soltero/a']);
                    break;
                case '2':
                    $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findOneBy(['estadoCivil' => 'Casado/a']);
                    break;
                case '3':
                    $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findOneBy(['estadoCivil' => 'Divorciado/a']);
                    break;
                case '4':
                    $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findOneBy(['estadoCivil' => 'Viudo/a']);
                    break;                
            }
            $estadoCivil = $this->em->getRepository(EstadoCivil::class)->findOneBy(['id' => $estadoCivil]);

            $tipoDocumento = $this->em->getRepository(TipoDocumento::class)->findOneBy(['tipoDocumento' => 'DNI']);
            $tipoCuitCuil = $this->em->getRepository(TipoCuitCuil::class)->findOneBy(['tipoCuitCuil' => 'CUIT']);
            $nacionalidad = $this->em->getRepository(Nacionalidad::class)->findOneBy(['pais' => 'Argentina']);

            $personaFisica = new PersonaFisica();
            $personaFisica->setNombres($nombre);
            $personaFisica->setApellido($apellido);
            $personaFisica->setNroDoc($dni);
            $personaFisica->setTipoCuitCuil($tipoCuitCuil);
            $personaFisica->setTipoDocumento($tipoDocumento);
            $personaFisica->setCuitCuil($cuit);
            $personaFisica->setSexo($sexo);
            $personaFisica->setEstadoCivil($estadoCivil);
            $personaFisica->setNacionalidad($nacionalidad);
            $this->em->persist($personaFisica);
            
        }

        //TODO: Verificar si existe el usuario en KC, En la DB, en alguna de las dos, y si no existe, crearlo.
        $usuario = $this->em->getRepository(User::class)->findOneBy(['realm' => $realmDB, 'personaFisica' => $personaFisica]);
        $usuarioKC = $this->kc->getUserInRealmByUsername($realm, $personaFisica->getCuitCuil());

        if ($usuario == null) {
            $output->writeln([
                '',
            ]);
            $question7 = new Question('Ingrese el email del nuevo super administrador:   ');
            $email = $helper->ask($input, $output, $question7);

            $usuarioPreexistente = $this->em->getRepository(User::class)->findOneBy(['email' => $email, 'realm' => $realmDB]);

            if ($usuarioPreexistente) {
                $output->writeln([                
                    'El email ya existe en la DB...',
                    '',
                ]);
                $usuario = $usuarioPreexistente;
            } else {
                $usuarioKC = $this->crearUsuarioKC($realm, $grupoKC, $personaFisica, $email);
                $usuario = new User();
                $usuario->setEmail($email);
                $usuario->setUsername($cuit);
                $usuario->setPassword('');
                $usuario->setPersonaFisica($personaFisica);
                $usuario->setRealm($realmDB);
                $usuario->setKeycloakId($usuarioKC->id);
                
                $this->em->persist($usuario);

                $usuarioGrupo = new UserGrupo();
                $usuarioGrupo->setGrupo($grupoDB);
                $usuarioGrupo->setUsuario($usuario);
                $this->em->persist($usuarioGrupo);

                $output->writeln([                
                    'Usuario creado en la DB y en KC! El password temporal es el DNI ingresado',
                    '',
                ]);
            }
            
        }

        $this->em->flush();

        $io->success('listo! El password temporal es el DNI ingresado');

        return Command::SUCCESS;
    
    }

    private function verificarRealm($realm) {

        $realmDB = $this->em->getRepository(Realm::class)->findOneBy(["realm"=>$realm]);
        $realmKC = $this->kc->getRealmByName($realm);
        if (!$realmDB){
            $realmDb = false;
        } else {
            $realmDb = true;
        }

        $content = (json_decode($realmKC->getContent()));
        if ($content == 200 || $content == "200") {
            $realmKC = true;
        } else {
            $realmKC = false;
        }

        $escenarioRealm = [
            "realmDB" => $realmDB,
            "realmKC" => $realmKC,
        ];

        return $escenarioRealm;
    }

    private function crearRealmDB() {
        $reamlDb = new Realm();
        $reamlDb->setRealm('Intranet');
        $this->em->persist($reamlDb);
        return $reamlDb;
    }

    private function crearRealmKC() {
        $this->kc->createKeycloakRealm('Intranet');
        $realmKC = $this->kc->getRealmByName('Intranet');
        return $realmKC;
    }

    private function verificarGrupo($realm, $grupo){
        $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(["nombre"=>$grupo]);
        $grupoKC = $this->kc->getRealmGroups($grupo, $realm, $briefRepresentation = false);

        if ($grupoDB == null){
            $grupoDB = false;
        } else {
            $grupoDB = true;
        }

        $g = false;
        foreach ($grupoKC as $gKc) {
            if ($gKc->name == $grupo) {
                $g = true;
                break;
            }
        }

        $escenarioGrupo = [
            "grupoKC" => $g,
            "grupoDB" => $grupoDB,
        ];

        return $escenarioGrupo;
    }

    private function getGroupKC($realm, $grupo) {
        $grupoKC = $this->kc->getRealmGroups($grupo, $realm, $briefRepresentation = true);
        

        foreach ($grupoKC as $gKc) {
            if ($gKc->name == $grupo) {
                $group = $gKc;
                
                break;
            } else {
                $group = null;
            }
        }

        if (is_array($group)) {
            $group = json_decode(json_encode($group));
        }

        return $group;
    }

    private function crearGrupoKC($realm, $grupo){
        $a = $this->kc->createGroup($realm, $grupo);
        $grupoKC = $this->kc->getRealmGroups($grupo, $realm, $briefRepresentation = false);
        if (is_array($grupoKC)) {
            $grupoKC = $grupoKC[0];
        }
        return $grupoKC;
    }

    private function crearGrupoDB($realmDB, $grupo, $grupoKC){
        
        if (is_array($grupoKC)) {
            $grupoKCId = $grupoKC[0];
            $grupoKCId = $grupoKCId->id;
        }
        if (is_object($grupoKC)) {
            $grupoKCId = $grupoKC->id;
        }        
        $grupoDB = new Grupo();
        $grupoDB->setNombre($grupo);
        $grupoDB->setRealm($realmDB);
        $grupoDB->setKeycloakGroupId($grupoKCId);
        
        $this->em->persist($grupoDB);
       
        return $grupoDB;
    }

    private function verificarRol($realm, $grupo, $roleCode, $roleName){
        //ver si existe el rol en la DB y en KC. 
        //De existir ver si hay incosistencias, (de haberlas repararlas). 
        //Finalmente ver si el rol está asignados al grupo (de no estarlo asignarlo)
        $roleKC = $this->kc->getRoleInRealmbyName($realm, $roleName);        
	echo "entro verificarRol -$roleCode-<br>";
        $roleDB = $this->em->getRepository(Role::class)->findOneBy(["code"=>$roleCode]);       

	echo "entro verificarRol2<br>";
        if ($roleDB == false) {
            $roleDB = false;
        } else {
            $roleDB = true;
        }
        $escenarioRol = [
            "roleKC" => $roleKC,
            "roleDB" => $roleDB,
        ];
        return $escenarioRol;
    }

    private function crearRoleKC($realm, $grupoKC, $roleCode, $roleName) {
        
        $this->kc->createRole($realm, $roleName, $roleCode);        
        $roleKC = $this->kc->getRole($roleName, $realm);
        
        return $roleKC;
    }

    private function crearRoleDB($realmDB, $grupoDB, $roleName, $roleCode, $roleKC) {
        $roleDB = new Role();
        $roleDB->setRealm($realmDB);
        $roleDB->setName($roleName);
        $roleDB->setCode($roleCode);
        $roleDB->setKeycloakRoleId($roleKC->id);
        
        $this->em->persist($roleDB);
        

        return $roleDB;
    }

    private function crearUsuarioKC($realm, $grupoKC, $personaFisica, $email) {
        $this->kc->postUsuario(
            $personaFisica->getCuitCuil(),
            $email,
            $personaFisica->getNombres(),
            $personaFisica->getApellido(),
            $personaFisica->getNroDoc(),
            true,
            $realm
        );
        $usuarioKC = $this->kc->getUserByUsernameAndRealm($personaFisica->getCuitCuil(), $realm);
        $this->addKCUserInGroup($realm, $grupoKC, $usuarioKC);
        return $usuarioKC;
    }

    private function verificarRoleGrupo($realm, $grupoKC, $grupoDB, $roleCode, $roleName, $roleDB) {
        
        $roleGrupoKC = $this->kc->getRoleGroupByName($realm, $grupoKC->id, $roleName);        
        $roleGrupoDB = $this->em->getRepository(RoleGrupo::class)->findOneBy(["grupo"=>$grupoDB, "role"=>$roleDB]);
        

        if ($roleGrupoDB == false) {
            $roleGrupoDB = false;
        } else {
            $roleGrupoDB = true;
        }

        if ($roleGrupoKC == false) {
            $roleGrupoKC = false;
        } else {
            $roleGrupoKC = true;
        }

        $escenarioRoleGrupo = [
            "roleGrupoKC" => $roleGrupoKC,
            "roleGrupoDB" => $roleGrupoDB,
        ];

        return $escenarioRoleGrupo;
    }

    private function crearRoleGrupoKC($realm, $grupoKC, $roleKC, $roleName, $roleCode) {
        $this->kc->addRoleToGroup($realm, $grupoKC->id, $roleKC);        
        $grupoRoleKC = $this->kc->getRoleGroupByName($realm, $grupoKC->id, $roleName);                                 
        
        return $grupoRoleKC;
    }

    private function crearRoleGrupoDB($grupoDB, $roleDB) {
        $grupoRoleDB = new RoleGrupo();        
        $grupoRoleDB->setRole($roleDB); 
        $grupoRoleDB->setGrupo($grupoDB);
        
        $this->em->persist($grupoRoleDB);
        $this->em->flush();
        return $grupoRoleDB;
    }

    private function addKCUserInGroup($realm, $grupoKC, $usuarioKC) {
        $this->kc->addUserToGroup($realm, $usuarioKC->id, $grupoKC->id);

        return;
    }
    
}
