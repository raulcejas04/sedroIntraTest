<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116174437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menuitem ADD CONSTRAINT FK_CAD1F2D6CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CAD1F2D6CCD7E912 ON menuitem (menu_id)');
        $this->addSql('ALTER TABLE persona_fisica ALTER cuit_cuil TYPE VARCHAR(13)');
        $this->addSql('ALTER TABLE persona_juridica ALTER cuit TYPE VARCHAR(13)');
        $this->addSql('DROP INDEX public_role_deletedby4_idx');
        $this->addSql('DROP INDEX public_role_company_id1_idx');
        $this->addSql('DROP INDEX public_role_updatedby3_idx');
        $this->addSql('DROP INDEX public_role_createdby2_idx');
        $this->addSql('ALTER TABLE role ALTER id DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN role.id IS NULL');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE rolemenu ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE rolemenu ALTER role_id DROP NOT NULL');
        $this->addSql('ALTER TABLE rolemenu ALTER menu_id DROP NOT NULL');
        $this->addSql('COMMENT ON COLUMN rolemenu.role_id IS NULL');
        $this->addSql('COMMENT ON COLUMN rolemenu.menu_id IS NULL');
        $this->addSql('ALTER TABLE rolemenu ADD CONSTRAINT FK_840CA71BCCD7E912 FOREIGN KEY (menu_id) REFERENCES menuitem (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rolemenu ADD CONSTRAINT FK_840CA71BD60322AC FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rolemenu ADD PRIMARY KEY (id)');
        $this->addSql('ALTER INDEX public_rolemenu_menu_id1_idx RENAME TO IDX_840CA71BCCD7E912');
        $this->addSql('ALTER INDEX public_rolemenu_role_id2_idx RENAME TO IDX_840CA71BD60322AC');
        $this->addSql('ALTER TABLE solicitud ALTER cuit TYPE VARCHAR(13)');
        $this->addSql('ALTER TABLE solicitud ALTER cuil TYPE VARCHAR(13)');
        $this->addSql('ALTER TABLE solicitud ALTER nicname TYPE VARCHAR(150)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE persona_juridica ALTER cuit TYPE VARCHAR(11)');
        $this->addSql('ALTER TABLE menuitem DROP CONSTRAINT FK_CAD1F2D6CCD7E912');
        $this->addSql('DROP INDEX IDX_CAD1F2D6CCD7E912');
        $this->addSql('CREATE SEQUENCE role_id_seq');
        $this->addSql('SELECT setval(\'role_id_seq\', (SELECT MAX(id) FROM role))');
        $this->addSql('ALTER TABLE role ALTER id SET DEFAULT nextval(\'role_id_seq\')');
        $this->addSql('COMMENT ON COLUMN role.id IS \'ID de rol.\'');
        $this->addSql('CREATE INDEX public_role_deletedby4_idx ON role (deletedby)');
        $this->addSql('CREATE INDEX public_role_company_id1_idx ON role (company_id)');
        $this->addSql('CREATE INDEX public_role_updatedby3_idx ON role (updatedby)');
        $this->addSql('CREATE INDEX public_role_createdby2_idx ON role (createdby)');
        $this->addSql('ALTER TABLE solicitud ALTER cuit TYPE VARCHAR(11)');
        $this->addSql('ALTER TABLE solicitud ALTER cuil TYPE VARCHAR(11)');
        $this->addSql('ALTER TABLE solicitud ALTER nicname TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE persona_fisica ALTER cuit_cuil TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE rolemenu DROP CONSTRAINT FK_840CA71BCCD7E912');
        $this->addSql('ALTER TABLE rolemenu DROP CONSTRAINT FK_840CA71BD60322AC');
        $this->addSql('DROP INDEX rolemenu_pkey');
        $this->addSql('ALTER TABLE rolemenu DROP id');
        $this->addSql('ALTER TABLE rolemenu ALTER menu_id SET NOT NULL');
        $this->addSql('ALTER TABLE rolemenu ALTER role_id SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN rolemenu.menu_id IS \'ID del menu.\'');
        $this->addSql('COMMENT ON COLUMN rolemenu.role_id IS \'ID del rol.\'');
        $this->addSql('ALTER TABLE rolemenu ADD PRIMARY KEY (role_id, menu_id)');
        $this->addSql('ALTER INDEX idx_840ca71bccd7e912 RENAME TO public_rolemenu_menu_id1_idx');
        $this->addSql('ALTER INDEX idx_840ca71bd60322ac RENAME TO public_rolemenu_role_id2_idx');
    }
}
