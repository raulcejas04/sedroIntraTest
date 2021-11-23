<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104185140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rolemenu DROP CONSTRAINT rolemenu_role_id_fkey');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE usuario_dispositivo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE usuario_dispositivo (id INT NOT NULL, usuario_id INT NOT NULL, dispositivo_id INT DEFAULT NULL, auditoria VARCHAR(255) DEFAULT NULL, fecha_alta TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, fecha_baja TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9874D460DB38439E ON usuario_dispositivo (usuario_id)');
        $this->addSql('CREATE INDEX IDX_9874D460FD37F77B ON usuario_dispositivo (dispositivo_id)');
        $this->addSql('ALTER TABLE usuario_dispositivo ADD CONSTRAINT FK_9874D460DB38439E FOREIGN KEY (usuario_id) REFERENCES "usuario" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuario_dispositivo ADD CONSTRAINT FK_9874D460FD37F77B FOREIGN KEY (dispositivo_id) REFERENCES dispositivo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE rolemenu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE usuario_dispositivo_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE role (id SERIAL NOT NULL, company_id INT DEFAULT NULL, code VARCHAR(15) DEFAULT NULL, name VARCHAR(50) NOT NULL, active SMALLINT DEFAULT 1, createdby INT DEFAULT NULL, createdat TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updatedby INT DEFAULT NULL, updatedat TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, deletedby INT DEFAULT NULL, deletedat TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, orderlist INT DEFAULT 1, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX public_role_deletedby4_idx ON role (deletedby)');
        $this->addSql('CREATE INDEX public_role_company_id1_idx ON role (company_id)');
        $this->addSql('CREATE INDEX public_role_updatedby3_idx ON role (updatedby)');
        $this->addSql('CREATE INDEX public_role_createdby2_idx ON role (createdby)');
        $this->addSql('COMMENT ON COLUMN role.id IS \'ID de rol.\'');
        $this->addSql('COMMENT ON COLUMN role.company_id IS \'Compania. Si esta en nulo, el rol puede ser seleccionado por cualquier compania.\'');
        $this->addSql('COMMENT ON COLUMN role.code IS \'Codigo de Rol.\'');
        $this->addSql('COMMENT ON COLUMN role.name IS \'Nombre del rol en idioma1.\'');
        $this->addSql('COMMENT ON COLUMN role.active IS \'Activo si=1 no=0.\'');
        $this->addSql('COMMENT ON COLUMN role.createdby IS \'usuario que creo el registro.\'');
        $this->addSql('COMMENT ON COLUMN role.createdat IS \'Fecha de creacion del registro.\'');
        $this->addSql('COMMENT ON COLUMN role.updatedby IS \'Usuario que modifico el regisro.\'');
        $this->addSql('COMMENT ON COLUMN role.updatedat IS \'Fecha de modificacion del registro.\'');
        $this->addSql('COMMENT ON COLUMN role.deletedby IS \'Por quien fue borrado.\'');
        $this->addSql('COMMENT ON COLUMN role.deletedat IS \'Fecha y hora de borrado.\'');
        $this->addSql('COMMENT ON COLUMN role.orderlist IS \'Orden\'');
        $this->addSql('CREATE TABLE rolemenu (role_id INT NOT NULL, menu_id INT NOT NULL, PRIMARY KEY(role_id, menu_id))');
        $this->addSql('CREATE INDEX public_rolemenu_role_id2_idx ON rolemenu (role_id)');
        $this->addSql('CREATE INDEX public_rolemenu_menu_id1_idx ON rolemenu (menu_id)');
        $this->addSql('COMMENT ON COLUMN rolemenu.role_id IS \'ID del rol.\'');
        $this->addSql('COMMENT ON COLUMN rolemenu.menu_id IS \'ID del menu.\'');
        $this->addSql('ALTER TABLE rolemenu ADD CONSTRAINT rolemenu_role_id_fkey FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE usuario_dispositivo');
    }
}
