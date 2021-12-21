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
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;

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
            
            ->addArgument('usuario', InputArgument::OPTIONAL, 'Usuario')
            ->addArgument('pass', InputArgument::OPTIONAL, 'Contraseña')
            //->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        //Datos de inicio. MUY IMPORTANTES!!!
        $realm = 'Intranet';
        $grupo = 'SuperAdministradores';
        $roleCode = 'ROLE_SUPER_ADMIN';
        $roleName = 'SuperAdministrador';

        //***************************************************************************
        //********** paso 1, Verificar el realm en KC y en la DB **********************************
        //***************************************************************************
        $escenarioRealm = $this->verificarRealm($realm);
        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmKC'] == true) {
            $output->writeln([                
                'Existe el reaml en la DB y en KC... continuando',
                '',
            ]);
            $realmDb = $this->em->getRepository(Realm::class)->findOneBy(['realm' => $realm]);
            $reamlCK = $this->kc->getRealmByName($realm);
        }

        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmKC'] == false) {
            $output->writeln([                
                'Existe el reaml en la DB y no en KC... creando realm en KC',
                '',
            ]);
            $realmDb = $this->em->getRepository(Realm::class)->findOneBy(['realm' => $realm]);
            $reamlCK = $this->crearRealmKC();
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmKC'] == true) {
            $output->writeln([                
                'Existe el reaml en KC y no en la DB... creando realm en la DB',
                '',
            ]);
            $reamlDb = $this->crearRealmDB();
            $reamlCK = $this->kc->getRealmByName($realm);
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmKC'] == false){
            $output->writeln([                
                'No existe el reaml en la DB ni en KC... creando realm en la DB y en KC',
                '',
            ]);
            $reamlDb = $this->crearRealmDB();
            $reamlCK = $this->crearRealmKC();
        }

        
        //***************************************************************************
        //****** paso 2, verificar el grupo en Keycloak y en la DB ********************************
        //***************************************************************************
        $escenarioGrupo = $this->verificarGrupo($realm, $grupo);
        if ($escenarioGrupo['grupoDB'] == true && $escenarioGrupo['grupoKC'] == true) {
            $output->writeln([                
                'Existe el grupo en la DB y en KC... continuando',
                '',
            ]);
            $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(['nombre' => $grupo]);
            $grupoKC = $this->kc->getGroupByName($realm, $grupo);
        }

        if ($escenarioGrupo['grupoDB'] == true && $escenarioGrupo['grupoKC'] == false) {
            $output->writeln([                
                'Existe el grupo en la DB y no en KC... creando grupo en KC',
                '',
            ]);
            $grupoKC = $this->crearGrupoKC($realm, $grupo);
            $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(['nombre' => $grupo]);
            
        }

        if ($escenarioGrupo['grupoDB'] == false && $escenarioGrupo['grupoKC'] == true) {
            $output->writeln([                
                'Existe el grupo en KC y no en la DB... creando grupo en la DB',
                '',
            ]);
            $grupoKC = $this->kc->getGroupByName($realm, $grupo, true);
            $grupoDB = $this->crearGrupoDB($realm, $grupo, $grupoKC);            
        }

        //***************************************************************************
        // paso 3, verificar el Rol ROLE_SUPER_ADMIN en Keycloak y en la DB ***********************
        //***************************************************************************
        $escenarioRol = $this->verificarRol($realm, $grupo, $roleCode, $roleName);
        if ($escenarioRol['roleKC'] == true && $escenarioRol['roleDB'] == true) {
            $output->writeln([                
                'Existe el rol en la DB y en KC... continuando',
                '',
            ]);
            $roleKC = $this->kc->getRoleByName($realm, $roleCode);
            $roleDB = $this->em->getRepository(Rol::class)->findOneBy(['nombre' => $roleCode]);
        }

        if ($escenarioRol['roleKC'] == true && $escenarioRol['roleDB'] == false) {
            $output->writeln([                
                'Existe el rol en KC y no en la DB... creando rol en la DB',
                '',
            ]);
            $roleKC = $this->kc->getRoleByName($realm, $roleCode);
            $roleDB = $this->crearRoleDB($realmDB, $roleCode, $roleName, $roleKC, $roleKC);
        }

        if ($escenarioRol['roleKC'] == false && $escenarioRol['roleDB'] == true) {
            $output->writeln([                
                'Existe el rol en la DB y no en KC... creando rol en KC',
                '',
            ]);
            $roleKC = $this->crearRoleKC($realm, $roleCode, $roleName);
            $roleDB = $this->em->getRepository(Rol::class)->findOneBy(['nombre' => $roleCode]);
        }

        if ($escenarioRol['roleKC'] == false && $escenarioRol['roleDB'] == false) {
            $output->writeln([                
                'No existe el rol en la DB ni en KC... creando rol en la DB y KC',
                '',
            ]);
            $roleKC = $this->crearRoleKC($realmCK, $GrupoCK, $roleCode, $roleName);

            $roleDB = $this->crearRoleDB($realmDB, $grupoDB, $roleName, $roleCode, $roleKC);
        }

        /*
        $grupo = new Grupo();
        $grupo->setNombre('SuperAdministradores');
        $grupo->setRealm($realm);
        $this->em->persist($grupo);

        $personaFisica = new PersonaFisica();
        $personaFisica->setNombre('SuperAdministrador');
        $personaFisica->setApellido('SuperAdministrador');
        $this->em->persist($personaFisica);
        //$personaFisica->setEmail($email);

        $usuario = new User();
        $usuario->setUsername($input->getArgument('usuario'));
        $usuario->setPassword($input->getArgument('pass'));
        $usuario->setPersonaFisica($personaFisica);
        $this->em->persist($usuario);
        

        $userGrupo = new UserGrupo();
        $userGrupo->setGrupo($grupo);
        $userGrupo->setUsuario($usuario);
        $this->em->persist($userGrupo);

*/


        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

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

        if (!$grupoDB){
            $grupoDB = false;
        } else {
            $grupoDB = true;
        }
        $escenarioGrupo = [
            "grupoDB" => $grupoDB,
        ];

        /*if ($grupoKC) {
            $grupoKC = true;
        } else {
            $grupoKC = false;
        }
        */

        dd($grupoKC);
        $content = (json_decode($grupoKC->Content));
        if ($grupoKC == 200 || $grupoKC == "200") {
            $grupoKC = true;
        } else {
            $grupoKC = false;
        }
        $escenarioGrupo = [
            "grupoKC" => $grupoKC,
        ];
        return $escenarioGrupo;
    }

    private function crearGrupoKC($realm, $grupo){
        $this->kc->createGroup($realm, $grupo);
        $grupoKC = $this->kc->getRealmGroups($grupo, $realm, $briefRepresentation = true);
        return $grupoKC;
    }

    private function crearGrupoDB($realm, $grupo, $grupoKC){
        $grupoDB = new Grupo();
        $grupoDB->setNombre($grupo);
        $grupoDB->setRealm($realm);
        $grupoDB->setKeycloakGroupId($grupoKC->id);
        $this->em->persist($grupoDB);
        return $grupoDB;
    }

    private function verificarRol($realm, $grupo, $roleCode, $roleName){
        //ver si existe el rol en la DB y en KC. 
        //De existir ver si hay incosistencias, (de haberlas repararlas). 
        //Finalmente ver si el rol está asignados al grupo (de no estarlo asignarlo)
        $roleKC = $this->kc->getRoleInRealmbyName($realm, $roleName);        
        $roleDB = $this->em->getRepository(Role::class)->findOneBy(["roleCode"=>$roleCode]);

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

    private function crearRoleKC($realm, $grupo, $roleName, $roleCode) {
        $this->kc->createRole($realm, $grupo, $roleName, $roleCode);
        $roleKC = $this->kc->getGroupRoles($grupo, $realm);
        return $roleKC;
    }

    private function crearRoleDB($realmDB, $grupo, $roleName, $roleCode, $roleKC) {
        $roleDB = new Role();
        $roleDB->setRealm($realmDB);
        $roleDB->setName($roleName);
        $roleDB->setCode($roleCode);
        $roleDB->setKeycloakRoleId($roleKC->id);
        $this->em->persist($roleDB);
        return $roleDB;
    }
    
}
