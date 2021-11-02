<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101121841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE sexo_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE name INCREMENT BY 1 MINVALUE 100 START 100');
        $this->addSql('ALTER TABLE dispositivo ALTER nicname TYPE VARCHAR(100)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE name CASCADE');
        $this->addSql('CREATE SEQUENCE sexo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE dispositivo ALTER nicname TYPE VARCHAR(20)');
    }
}
