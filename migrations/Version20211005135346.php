<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005135346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dispositivo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE estado_civil_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE nacionalidad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE parametros_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE persona_fisica_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE persona_juridica_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE realm_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sexo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE solicitud_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_cuit_cuil_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipo_documento_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dispositivo (id INT NOT NULL, persona_juridica_id INT DEFAULT NULL, nicname VARCHAR(20) NOT NULL, fecha_alta DATE DEFAULT NULL, fecha_baja DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A05F26EEC4B65DE ON dispositivo (persona_juridica_id)');
        $this->addSql('CREATE TABLE estado_civil (id INT NOT NULL, estado_civil VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE nacionalidad (id INT NOT NULL, pais VARCHAR(255) NOT NULL, codigo VARCHAR(4) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE parametros (id INT NOT NULL, parametro VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, fecha_desde DATE DEFAULT NULL, fecha_hasta DATE DEFAULT NULL, valor VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE persona_fisica (id INT NOT NULL, tipo_cuit_cuil_id INT NOT NULL, sexo_id INT NOT NULL, estado_civil_id INT DEFAULT NULL, nacionalidad_id INT NOT NULL, tipo_documento_id INT NOT NULL, apellido VARCHAR(255) NOT NULL, nombres VARCHAR(255) NOT NULL, nro_doc VARCHAR(255) NOT NULL, cuit_cuil VARCHAR(255) NOT NULL, fecha_nac DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA4EDBEA89E70F80 ON persona_fisica (tipo_cuit_cuil_id)');
        $this->addSql('CREATE INDEX IDX_FA4EDBEA2B32DB58 ON persona_fisica (sexo_id)');
        $this->addSql('CREATE INDEX IDX_FA4EDBEA75376D93 ON persona_fisica (estado_civil_id)');
        $this->addSql('CREATE INDEX IDX_FA4EDBEAAB8DC0F8 ON persona_fisica (nacionalidad_id)');
        $this->addSql('CREATE INDEX IDX_FA4EDBEAF6939175 ON persona_fisica (tipo_documento_id)');
        $this->addSql('CREATE TABLE persona_juridica (id INT NOT NULL, cuit VARCHAR(11) NOT NULL, razon_social VARCHAR(255) NOT NULL, fecha_alta DATE DEFAULT NULL, fecha_baja DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE realm (id INT NOT NULL, realm VARCHAR(255) NOT NULL, id_realm_keycloak VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sexo (id INT NOT NULL, sexo VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE solicitud (id INT NOT NULL, realm_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, persona_fisica_id INT DEFAULT NULL, persona_juridica_id INT DEFAULT NULL, dispositivo_id INT DEFAULT NULL, cuit VARCHAR(11) DEFAULT NULL, cuil VARCHAR(11) DEFAULT NULL, nicname VARCHAR(20) NOT NULL, fecha_alta TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, mail VARCHAR(255) NOT NULL, fecha_expiracion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, hash VARCHAR(255) NOT NULL, fecha_uso TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, correccion TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_96D27CC09DFF5F89 ON solicitud (realm_id)');
        $this->addSql('CREATE INDEX IDX_96D27CC0DB38439E ON solicitud (usuario_id)');
        $this->addSql('CREATE INDEX IDX_96D27CC0319CE0FF ON solicitud (persona_fisica_id)');
        $this->addSql('CREATE INDEX IDX_96D27CC0C4B65DE ON solicitud (persona_juridica_id)');
        $this->addSql('CREATE INDEX IDX_96D27CC0FD37F77B ON solicitud (dispositivo_id)');
        $this->addSql('CREATE TABLE tipo_cuit_cuil (id INT NOT NULL, tipo_cuit_cuil VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tipo_documento (id INT NOT NULL, tipo_documento VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "usuario" (id INT NOT NULL, realm_id INT DEFAULT NULL, persona_fisica_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) DEFAULT NULL, keycloak_id VARCHAR(255) DEFAULT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON "usuario" (email)');
        $this->addSql('CREATE INDEX IDX_2265B05D9DFF5F89 ON "usuario" (realm_id)');
        $this->addSql('CREATE INDEX IDX_2265B05D319CE0FF ON "usuario" (persona_fisica_id)');
        $this->addSql('ALTER TABLE dispositivo ADD CONSTRAINT FK_A05F26EEC4B65DE FOREIGN KEY (persona_juridica_id) REFERENCES persona_juridica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persona_fisica ADD CONSTRAINT FK_FA4EDBEA89E70F80 FOREIGN KEY (tipo_cuit_cuil_id) REFERENCES tipo_cuit_cuil (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persona_fisica ADD CONSTRAINT FK_FA4EDBEA2B32DB58 FOREIGN KEY (sexo_id) REFERENCES sexo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persona_fisica ADD CONSTRAINT FK_FA4EDBEA75376D93 FOREIGN KEY (estado_civil_id) REFERENCES estado_civil (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persona_fisica ADD CONSTRAINT FK_FA4EDBEAAB8DC0F8 FOREIGN KEY (nacionalidad_id) REFERENCES nacionalidad (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE persona_fisica ADD CONSTRAINT FK_FA4EDBEAF6939175 FOREIGN KEY (tipo_documento_id) REFERENCES tipo_documento (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC09DFF5F89 FOREIGN KEY (realm_id) REFERENCES realm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC0DB38439E FOREIGN KEY (usuario_id) REFERENCES "usuario" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC0319CE0FF FOREIGN KEY (persona_fisica_id) REFERENCES persona_fisica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC0C4B65DE FOREIGN KEY (persona_juridica_id) REFERENCES persona_juridica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE solicitud ADD CONSTRAINT FK_96D27CC0FD37F77B FOREIGN KEY (dispositivo_id) REFERENCES dispositivo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "usuario" ADD CONSTRAINT FK_2265B05D9DFF5F89 FOREIGN KEY (realm_id) REFERENCES realm (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "usuario" ADD CONSTRAINT FK_2265B05D319CE0FF FOREIGN KEY (persona_fisica_id) REFERENCES persona_fisica (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE solicitud DROP CONSTRAINT FK_96D27CC0FD37F77B');
        $this->addSql('ALTER TABLE persona_fisica DROP CONSTRAINT FK_FA4EDBEA75376D93');
        $this->addSql('ALTER TABLE persona_fisica DROP CONSTRAINT FK_FA4EDBEAAB8DC0F8');
        $this->addSql('ALTER TABLE solicitud DROP CONSTRAINT FK_96D27CC0319CE0FF');
        $this->addSql('ALTER TABLE "usuario" DROP CONSTRAINT FK_2265B05D319CE0FF');
        $this->addSql('ALTER TABLE dispositivo DROP CONSTRAINT FK_A05F26EEC4B65DE');
        $this->addSql('ALTER TABLE solicitud DROP CONSTRAINT FK_96D27CC0C4B65DE');
        $this->addSql('ALTER TABLE solicitud DROP CONSTRAINT FK_96D27CC09DFF5F89');
        $this->addSql('ALTER TABLE "usuario" DROP CONSTRAINT FK_2265B05D9DFF5F89');
        $this->addSql('ALTER TABLE persona_fisica DROP CONSTRAINT FK_FA4EDBEA2B32DB58');
        $this->addSql('ALTER TABLE persona_fisica DROP CONSTRAINT FK_FA4EDBEA89E70F80');
        $this->addSql('ALTER TABLE persona_fisica DROP CONSTRAINT FK_FA4EDBEAF6939175');
        $this->addSql('ALTER TABLE solicitud DROP CONSTRAINT FK_96D27CC0DB38439E');
        $this->addSql('DROP SEQUENCE dispositivo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE estado_civil_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE nacionalidad_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE parametros_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE persona_fisica_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE persona_juridica_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE realm_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sexo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE solicitud_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_cuit_cuil_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipo_documento_id_seq CASCADE');
        $this->addSql('DROP TABLE dispositivo');
        $this->addSql('DROP TABLE estado_civil');
        $this->addSql('DROP TABLE nacionalidad');
        $this->addSql('DROP TABLE parametros');
        $this->addSql('DROP TABLE persona_fisica');
        $this->addSql('DROP TABLE persona_juridica');
        $this->addSql('DROP TABLE realm');
        $this->addSql('DROP TABLE sexo');
        $this->addSql('DROP TABLE solicitud');
        $this->addSql('DROP TABLE tipo_cuit_cuil');
        $this->addSql('DROP TABLE tipo_documento');
        $this->addSql('DROP TABLE "usuario"');
    }
}
