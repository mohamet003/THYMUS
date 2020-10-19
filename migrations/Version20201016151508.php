<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201016151508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE case_cochee_multiple ADD CONSTRAINT FK_1E5E006F6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE patient ADD rcp_rythmique_date DATE DEFAULT NULL');
}

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE case_cochee_multiple DROP FOREIGN KEY FK_1E5E006F6B899279');
        $this->addSql('ALTER TABLE patient DROP rcp_rythmique_date, CHANGE tnm_m tnm_m LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_anapath_post_op autre_anapath_post_op LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_post_tnm_t autre_post_tnm_t LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_post_tnm_n autre_post_tnm_n LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_post_tnm_m autre_post_tnm_m LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE duree_rean duree_rean LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_post_op_suites autre_post_op_suites LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE autre_chirurgien_referent autre_chirurgien_referent LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE file_anapath_post_op file_anapath_post_op LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE file_chirurgie file_chirurgie LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE user_create user_create LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE user_update user_update LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE reste_riques reste_riques LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE chir_txt_libre chir_txt_libre LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE diag_acp_thymone diag_acp_thymone LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE masaoko_koga masaoko_koga LONGTEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
    }
}
