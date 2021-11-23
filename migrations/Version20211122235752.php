<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122235752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE rol_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE user_realm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_realm (id INT NOT NULL, realm_id INT NOT NULL, usuario_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_185420829DFF5F89 ON user_realm (realm_id)');
        $this->addSql('CREATE INDEX IDX_18542082DB38439E ON user_realm (usuario_id)');
        $this->addSql('CREATE TABLE user_role (id INT NOT NULL, role_id INT NOT NULL, usuario_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3DB38439E ON user_role (usuario_id)');
        $this->addSql('ALTER TABLE user_realm ADD CONSTRAINT FK_185420829DFF5F89 FOREIGN KEY (realm_id) REFERENCES realm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_realm ADD CONSTRAINT FK_18542082DB38439E FOREIGN KEY (usuario_id) REFERENCES "usuario" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3DB38439E FOREIGN KEY (usuario_id) REFERENCES "usuario" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE rol');
        $this->addSql('DROP TABLE rol_audit');
        $this->addSql('ALTER TABLE tipo_dispositivo ADD grupo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tipo_dispositivo ADD CONSTRAINT FK_957B08169C833003 FOREIGN KEY (grupo_id) REFERENCES grupo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957B08169C833003 ON tipo_dispositivo (grupo_id)');
        $this->addSql('ALTER TABLE tipo_dispositivo_audit ADD grupo_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_realm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_role_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE rol_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE rol (id INT NOT NULL, tipo_dispositivo_id INT DEFAULT NULL, nombre_rol VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e553f3771e438db ON rol (tipo_dispositivo_id)');
        $this->addSql('CREATE TABLE rol_audit (id INT NOT NULL, rev INT NOT NULL, tipo_dispositivo_id INT DEFAULT NULL, nombre_rol VARCHAR(255) DEFAULT NULL, revtype VARCHAR(4) NOT NULL, PRIMARY KEY(id, rev))');
        $this->addSql('CREATE INDEX rev_f42eaa178cd7f58ff8934fdaf306a955_idx ON rol_audit (rev)');
        $this->addSql('ALTER TABLE rol ADD CONSTRAINT fk_e553f3771e438db FOREIGN KEY (tipo_dispositivo_id) REFERENCES tipo_dispositivo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rol_audit ADD CONSTRAINT rev_f42eaa178cd7f58ff8934fdaf306a955_fk FOREIGN KEY (rev) REFERENCES revisions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE user_realm');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE tipo_dispositivo DROP CONSTRAINT FK_957B08169C833003');
        $this->addSql('DROP INDEX UNIQ_957B08169C833003');
        $this->addSql('ALTER TABLE tipo_dispositivo DROP grupo_id');
        $this->addSql('ALTER TABLE tipo_dispositivo_audit DROP grupo_id');
    }
}
