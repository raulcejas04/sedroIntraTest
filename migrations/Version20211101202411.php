<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101202411 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE menuitem_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE prueba_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE prueba (id INT NOT NULL, campo_string VARCHAR(20) NOT NULL, campo_integer INT NOT NULL, campo_email TEXT DEFAULT NULL, campo_texto TEXT DEFAULT NULL, campo_mail VARCHAR(255) NOT NULL, campo_real DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE rolemenu');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE dispositivo ALTER nicname TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE menu ALTER id DROP DEFAULT');
        $this->addSql('DROP INDEX public_menu_action2_idx');
        $this->addSql('ALTER TABLE menuitem ALTER orderlist1 DROP DEFAULT');
        $this->addSql('ALTER TABLE menuitem ALTER divider DROP DEFAULT');
        $this->addSql('ALTER INDEX public_menu_parent_id1_idx RENAME TO IDX_CAD1F2D6727ACA70');
        $this->addSql('ALTER TABLE solicitud ADD creacion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE menuitem_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE prueba_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE rolemenu (role_id INT NOT NULL, menu_id INT NOT NULL, PRIMARY KEY(role_id, menu_id))');
        $this->addSql('CREATE INDEX public_rolemenu_menu_id1_idx ON rolemenu (menu_id)');
        $this->addSql('CREATE INDEX public_rolemenu_role_id2_idx ON rolemenu (role_id)');
        $this->addSql('COMMENT ON COLUMN rolemenu.role_id IS \'ID del rol.\'');
        $this->addSql('COMMENT ON COLUMN rolemenu.menu_id IS \'ID del menu.\'');
        $this->addSql('CREATE TABLE role (id SERIAL NOT NULL, company_id INT DEFAULT NULL, code VARCHAR(15) DEFAULT NULL, name VARCHAR(50) NOT NULL, active SMALLINT DEFAULT 1, createdby INT DEFAULT NULL, createdat TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updatedby INT DEFAULT NULL, updatedat TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, deletedby INT DEFAULT NULL, deletedat TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, orderlist INT DEFAULT 1, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX public_role_updatedby3_idx ON role (updatedby)');
        $this->addSql('CREATE INDEX public_role_createdby2_idx ON role (createdby)');
        $this->addSql('CREATE INDEX public_role_company_id1_idx ON role (company_id)');
        $this->addSql('CREATE INDEX public_role_deletedby4_idx ON role (deletedby)');
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
        $this->addSql('ALTER TABLE rolemenu ADD CONSTRAINT rolemenu_role_id_fkey FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE prueba');
        $this->addSql('ALTER TABLE dispositivo ALTER nicname TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE solicitud DROP creacion');
        $this->addSql('CREATE SEQUENCE menu_id_seq');
        $this->addSql('SELECT setval(\'menu_id_seq\', (SELECT MAX(id) FROM menu))');
        $this->addSql('ALTER TABLE menu ALTER id SET DEFAULT nextval(\'menu_id_seq\')');
        $this->addSql('ALTER TABLE menuitem ALTER orderlist1 SET DEFAULT 0');
        $this->addSql('ALTER TABLE menuitem ALTER divider SET DEFAULT 0');
        $this->addSql('CREATE INDEX public_menu_action2_idx ON menuitem (action)');
        $this->addSql('ALTER INDEX idx_cad1f2d6727aca70 RENAME TO public_menu_parent_id1_idx');
    }
}
