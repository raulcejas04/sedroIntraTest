<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
class DatosDeInicioCommand extends Command {

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'datos-de-inicio';
    private $em;

    private CONST DIR = "./src/Data";

    public function __construct(EntityManagerInterface $em) {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure(): void {
        $this
                // Descripción corta cuando hacés un "php bin/console list"
                ->setDescription('Crea los datos de inicio de la aplicación')
                ->setHelp('Este comando crea los datos de inicio de la aplicación');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {
        $output->writeln([
            'Datos de inicio',
            '===============',
            '',
        ]);

        $files = $this->getQuerys();
        foreach ($files as $file) {
            $path = self::DIR . "/" . $file;
            $output->writeln("Ejecutando " . basename($path) . " ...");
            $query = file_get_contents($path);
            $statement = $this->em->getConnection()->prepare($query);
            $statement->execute();
        }
        return Command::SUCCESS;
    }

    private function getQuerys() {
        $files = array_diff(scandir(self::DIR), array('.', '..'));
        return $files;
    }

}
