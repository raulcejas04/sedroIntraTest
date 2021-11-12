<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:datos-de-inicio';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }


    protected function configure(): void
    {
        $this
            // Descripción corta cuando hacés un "php bin/console list"
            ->setDescription('Crea los datos de inicio de la aplicación')
            ->setHelp('Este comando crea los datos de inicio de la aplicación')
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
        $output->writeln([
            'Datos de inicio',
            '===============',
            '',
        ]);

        //$menu = new Menu();
        //$this->em->persist($Menu);
        //$this->em->flush();


        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}