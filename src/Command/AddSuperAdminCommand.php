<?php

namespace App\Command;


use App\Service\KeycloakApiSrv;
use App\Controller\KeycloakFullApiController;
use App\Entity\Realm;
use App\Entity\Grupo;
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
    private $ks;

    public function __construct(EntityManagerInterface $em, KeycloakFullApiController $ks) {
        parent::__construct();
        $this->em = $em;
        $this->ks = $ks;
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
        $output->writeln([
            'Creando datos de inicio',
            '=======================',
            '',
        ]);
        sleep(2);
        $output->writeln([
            //TODO: Meter Realms, grupos y roles tanto en la DB como en KC. Luego los datos de inicio 
            //      como nacionalidad, tipoDocumento, TipoCuitCuil, Sexo, etc.            
            'no está programado',
            '==================',
            '',
        ]);
        sleep(1);

        //paso 1, verificar que no exista el realm en Keycloak ni en la DB
        $escenarioRealm = $this->verificarRealm('Intranet');
        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmCK'] == true) {
            $output->writeln([                
                'Existe el reaml en la DB y en KC... continuando',
                '',
            ]);
            $realmDb = $this->em->getRepository(Realm::class)->findOneBy(['nombre' => 'Intranet']);
            $reamlCK = $this->kc->getRealmByName('Intranet');
        }

        if ($escenarioRealm['realmDB'] == true && $escenarioRealm['realmCK'] == false) {
            $output->writeln([                
                'Existe el reaml en la DB y no en KC... creando realm en KC',
                '',
            ]);
            $realmDb = $this->em->getRepository(Realm::class)->findOneBy(['nombre' => 'Intranet']);
            $reamlCK = $this->crearRealmKC();
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmCK'] == true) {
            $output->writeln([                
                'Existe el reaml en KC y no en la DB... creando realm en la DB',
                '',
            ]);
            $reamlDb = $this->crearRealmDB();
            $reamlCK = $this->kc->getRealmByName('Intranet');
        }

        if ($escenarioRealm['realmDB'] == false && $escenarioRealm['realmCK'] == false){
            $output->writeln([                
                'No existe el reaml en la DB ni en KC... creando realm en la DB y en KC',
                '',
            ]);
            $reamlDb = $this->crearRealmDB();
            $reamlCK = $this->crearRealmKC();
        }

        
        //paso 2, verificar que no exista el grupo en Keycloak ni en la DB
        $escenarioGrupo = $this->verificarGrupo('Administradores');
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
        $realmCK = $this->ks->getRealmByName($realm);
        if (!$realmDB){
            $realmDb = false;
        } else {
            $realmDb = true;
        }

        $realmCK = $this->ks->getRealmByName('Intranet');  
        $content = (json_decode($realmCK->getContent()));
        if ($content == 200 || $content == "200") {
            $realmCK = true;
        } else {
            $realmCK = false;
        }

        $escenarioRealm = [
            "realmDB" => $realmDB,
            "realmCK" => $realmCK,
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
        $realmCK = $this->ks->getRealmByName('Intranet');
        return $realmCK;
    }

    private function verificarGrupo($grupo){
        $grupoDB = $this->em->getRepository(Grupo::class)->findOneBy(["nombre"=>$grupo]);
        $grupoCK = $this->ks->viewKeycloakGroupInRealm('Intranet', $grupo);
        if (!$grupoDB){
            $grupoDB = false;
        } else {
            $grupoDB = true;
        }
        $escenarioGrupo = [
            "grupoDB" => $grupoDB,
        ];

        $content = (json_decode($grupoCK->getContent()));
        if ($grupoCK == 200 || $grupoCK == "200") {
            $grupoCK = true;
        } else {
            $grupoCK = false;
        }
        $escenarioGrupo = [
            "grupoCK" => $grupoCK,
        ];
        return $escenarioGrupo;
    }
}
