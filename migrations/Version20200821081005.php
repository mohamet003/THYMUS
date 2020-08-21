<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200821081005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD deces_che TINYINT(1) DEFAULT NULL, ADD pousse TINYINT(1) DEFAULT NULL, ADD paralysie TINYINT(1) DEFAULT NULL, ADD paralysie_cur TINYINT(1) DEFAULT NULL, ADD pneumopatie TINYINT(1) DEFAULT NULL, ADD bullage TINYINT(1) DEFAULT NULL, ADD decollement TINYINT(1) DEFAULT NULL, ADD saignement TINYINT(1) DEFAULT NULL, ADD infection TINYINT(1) DEFAULT NULL, CHANGE tnm_m tnm_m TEXT DEFAULT NULL, CHANGE autre_anapath_post_op autre_anapath_post_op TEXT DEFAULT NULL, CHANGE autre_post_tnm_t autre_post_tnm_t TEXT DEFAULT NULL, CHANGE autre_post_tnm_n autre_post_tnm_n TEXT DEFAULT NULL, CHANGE autre_post_tnm_m autre_post_tnm_m TEXT DEFAULT NULL, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm TEXT DEFAULT NULL, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op TEXT DEFAULT NULL, CHANGE duree_rean duree_rean TEXT DEFAULT NULL, CHANGE autre_post_op_suites autre_post_op_suites TEXT DEFAULT NULL, CHANGE autre_chirurgien_referent autre_chirurgien_referent TEXT DEFAULT NULL, CHANGE file_anapath_post_op file_anapath_post_op TEXT DEFAULT NULL, CHANGE file_chirurgie file_chirurgie TEXT DEFAULT NULL, CHANGE user_create user_create TEXT DEFAULT NULL, CHANGE user_update user_update TEXT DEFAULT NULL, CHANGE reste_riques reste_riques TEXT DEFAULT NULL, CHANGE chir_txt_libre chir_txt_libre TEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP deces_che, DROP pousse, DROP paralysie, DROP paralysie_cur, DROP pneumopatie, DROP bullage, DROP decollement, DROP saignement, DROP infection, CHANGE tnm_m tnm_m VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_anapath_post_op autre_anapath_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_t autre_post_tnm_t VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_n autre_post_tnm_n VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_m autre_post_tnm_m VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duree_rean duree_rean VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_op_suites autre_post_op_suites VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_chirurgien_referent autre_chirurgien_referent VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_anapath_post_op file_anapath_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_chirurgie file_chirurgie VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_create user_create VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_update user_update VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reste_riques reste_riques VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE chir_txt_libre chir_txt_libre VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
