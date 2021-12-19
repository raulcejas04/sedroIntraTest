<?php

namespace App\Command;

use App\Entity\Grupo;
use App\Entity\Realm;
use App\Entity\UserRealm;
use App\Entity\User;
use App\Service\KeycloakApiSrv;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
class SincronizarKeycloakCommand extends Command {

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'sync-keycloak';
    private $em;
    private $ks;

    public function __construct(EntityManagerInterface $em,KeycloakApiSrv $ks) {
        parent::__construct();
        $this->em = $em;
        $this->ks = $ks;
    }

    protected function configure(): void {
        $this
                // Descripción corta cuando hacés un "php bin/console list"
                ->setDescription('Comando para sincronizar keycloak y la base de datos')
                ->setHelp('Este sirve para sincronizar los datos de keycloak con la base de datos de sedronar.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {
        $output->writeln([
            'From Keycloak to DB',
            '===============',
            '',
        ]);

        $realms = $this->ks->getRealms();
        foreach($realms as $realm){
            $_realm = $this->em->getRepository(Realm::class)->findOneBy(["realm"=>$realm->id]);

            if(!$_realm){
                $_realm = new Realm();
                $_realm->setKeycloakRealmId($realm->id);
                $_realm->setRealm($realm->id);           
            }

            $groups = $this->ks->getGroups($realm->id);

            foreach($groups as $group){
                $_group = $this->em->getRepository(Grupo::class)->findOneBy(["KeycloakGroupId"=> $group->id]);
                $_group = $_group ? $_group : new Grupo();
                $_group->setKeycloakGroupId($group->id);
                $_group->setNombre($group->name);     
                $_group->setRealm($_realm);
                $_realm->addGrupo($_group);
            }

            $users = $this->ks->getUsers($realm->id);
            foreach($users as $user){
                $_user = $this->em->getRepository(User::class)->findOneBy(["KeycloakId"=>$user->id]);
                if(!$_user){
                    $output->writeln('<danger>Hay una inconsistencia con el usuario'.$user->username.'.</danger>');
                }
                $userRealm = $this->em->getRepository(UserRealm::class)->findOneBy(["usuario"=>$_user,"realm"=>$_realm]);
                if(!$userRealm && $_user){
                    $userRealm = new UserRealm();
                    $userRealm->setRealm($_realm);
                    $userRealm->setUsuario($_user);
                    $_realm->addUserRealm($userRealm);
                }
            }
            
            $this->em->persist($_realm);
            $this->em->flush();
        }

        $output->writeln('<info>Datos sincronizados correctamente.</info>');

        return Command::SUCCESS;
    }
}
