<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215113203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD autre_chir_abord NVARCHAR(100)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD dossier_pre_preop NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD interv_convfor_rcp NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD dossier_pre_post NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD decision_con_rcp NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD patient_in_protocole NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD comm_inter_conf_rcp VARCHAR(MAX)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD comm_deci_con_rcp VARCHAR(MAX)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD comm_pat_in_protocole VARCHAR(MAX)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD immuno_preop NVARCHAR(50)');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD decomp_post BIT');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ADD comm_decom_post VARCHAR(MAX)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'THYMUS_JNX_USER\', N\'COLUMN\', roles');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN autre_chir_abord');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN dossier_pre_preop');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN interv_convfor_rcp');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN dossier_pre_post');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN decision_con_rcp');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN patient_in_protocole');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN comm_inter_conf_rcp');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN comm_deci_con_rcp');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN comm_pat_in_protocole');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN immuno_preop');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN decomp_post');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT DROP COLUMN comm_decom_post');
        $this->addSql('ALTER TABLE THYMUS_FORM_PATIENT ALTER COLUMN diag_acp_thymone VARCHAR(MAX) COLLATE French_CI_AS');
        $this->addSql('ALTER TABLE THYMUS_JNX_USER ALTER COLUMN roles VARCHAR(MAX) COLLATE French_CI_AS NOT NULL');
        $this->addSql('EXEC sp_dropextendedproperty N\'MS_Description\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'THYMUS_JNX_USER\', N\'COLUMN\', roles');
    }
}
