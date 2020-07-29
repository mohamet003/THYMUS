<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200727095719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE case_cochee_multiple (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, nom_case VARCHAR(255) DEFAULT NULL, value_case VARCHAR(255) DEFAULT NULL, texte_case VARCHAR(255) DEFAULT NULL, INDEX IDX_1E5E006F6B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, ddn DATETIME NOT NULL, sexe VARCHAR(10) NOT NULL, poids DOUBLE PRECISION NOT NULL, taille DOUBLE PRECISION NOT NULL, chirurgien_referent VARCHAR(255) NOT NULL, ps VARCHAR(10) DEFAULT NULL, mode_de_decouverte VARCHAR(255) DEFAULT NULL, mode_obt_his_pre_ope VARCHAR(255) DEFAULT NULL, histo_pre_op VARCHAR(255) DEFAULT NULL, indication VARCHAR(255) DEFAULT NULL, cons_neu_dep_mg_pre_op VARCHAR(255) DEFAULT NULL, score_myast_pre_op INT DEFAULT NULL, irm VARCHAR(255) DEFAULT NULL, tdm VARCHAR(255) DEFAULT NULL, petscan VARCHAR(255) DEFAULT NULL, chimio_pre_op VARCHAR(255) DEFAULT NULL, reponse_chimio_pre_op VARCHAR(255) DEFAULT NULL, x_tnm VARCHAR(255) DEFAULT NULL, tnm_t VARCHAR(255) DEFAULT NULL, tnm_n VARCHAR(255) DEFAULT NULL, tnm_m VARCHAR(255) NOT NULL, tnm_stade_ctnm VARCHAR(255) DEFAULT NULL, stade_masaoka_pre_op VARCHAR(255) DEFAULT NULL, maladi_auto_imm_assoc VARCHAR(255) DEFAULT NULL, syndrome_paraneo VARCHAR(255) DEFAULT NULL, epp VARCHAR(255) DEFAULT NULL, anticorps_anti_rach VARCHAR(255) DEFAULT NULL, rcp_rythmique VARCHAR(255) DEFAULT NULL, chir_date_ope DATETIME DEFAULT NULL, chir_abord VARCHAR(255) DEFAULT NULL, chir_thoracos VARCHAR(255) DEFAULT NULL, chir_robo_assist VARCHAR(255) DEFAULT NULL, chir_geste VARCHAR(255) DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, insufflation_co2 VARCHAR(255) DEFAULT NULL, conversion VARCHAR(255) DEFAULT NULL, chir_duree VARCHAR(10) DEFAULT NULL, chir_sang VARCHAR(10) DEFAULT NULL, mortalite_par_ope VARCHAR(255) DEFAULT NULL, complication_pre_ope LONGTEXT DEFAULT NULL, chir_drainage VARCHAR(50) DEFAULT NULL, chir_interv_interac VARCHAR(10) DEFAULT NULL, qualite_resection VARCHAR(255) DEFAULT NULL, anapath_post_op VARCHAR(255) DEFAULT NULL, pre_op_x_tnm VARCHAR(255) DEFAULT NULL, post_tnm_t VARCHAR(255) DEFAULT NULL, post_tnm_n VARCHAR(255) DEFAULT NULL, post_tnm_m VARCHAR(255) DEFAULT NULL, post_tnm_stade_ctnm VARCHAR(255) DEFAULT NULL, rea_usc_post_op VARCHAR(255) DEFAULT NULL, post_op_suites VARCHAR(255) DEFAULT NULL, post_op_duree_drainage INT DEFAULT NULL, pre_op_duree_rea INT DEFAULT NULL, post_op_date_sortie DATETIME DEFAULT NULL, chimio_post_op VARCHAR(255) DEFAULT NULL, radiotherapie_post_op VARCHAR(255) DEFAULT NULL, date_der_nouvelles DATETIME DEFAULT NULL, suivi_myasthenie LONGTEXT DEFAULT NULL, score_mya_post_op INT DEFAULT NULL, recidive VARCHAR(10) DEFAULT NULL, date_recidive DATETIME DEFAULT NULL, localisation_recidive LONGTEXT DEFAULT NULL, traitement_rechute_recidive LONGTEXT DEFAULT NULL, num_acp LONGTEXT DEFAULT NULL, deces VARCHAR(10) DEFAULT NULL, cause_deces VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE case_cochee_multiple ADD CONSTRAINT FK_1E5E006F6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE case_cochee_multiple DROP FOREIGN KEY FK_1E5E006F6B899279');
        $this->addSql('DROP TABLE case_cochee_multiple');
        $this->addSql('DROP TABLE patient');
    }
}
