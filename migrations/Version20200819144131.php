<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200819144131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD hta TINYINT(1) DEFAULT NULL, ADD tvi TINYINT(1) DEFAULT NULL, ADD od TINYINT(1) DEFAULT NULL, ADD og TINYINT(1) DEFAULT NULL, ADD aorte TINYINT(1) DEFAULT NULL, ADD pericard TINYINT(1) DEFAULT NULL, ADD phreniqued TINYINT(1) DEFAULT NULL, ADD phreniqueg TINYINT(1) DEFAULT NULL, ADD wedge TINYINT(1) DEFAULT NULL, ADD lobectomie TINYINT(1) DEFAULT NULL, ADD pneug TINYINT(1) DEFAULT NULL, ADD pneud TINYINT(1) DEFAULT NULL, ADD avc TINYINT(1) DEFAULT NULL, ADD ap TINYINT(1) DEFAULT NULL, ADD obesite TINYINT(1) DEFAULT NULL, ADD dyslipide TINYINT(1) DEFAULT NULL, ADD diabete TINYINT(1) DEFAULT NULL, ADD ins_ren_chr TINYINT(1) DEFAULT NULL, ADD maladie_thro_vein TINYINT(1) DEFAULT NULL, ADD cancer TINYINT(1) DEFAULT NULL, ADD cardiopathie TINYINT(1) DEFAULT NULL, ADD tabagisme TINYINT(1) DEFAULT NULL, ADD kystique TINYINT(1) DEFAULT NULL, ADD non_kystique TINYINT(1) DEFAULT NULL, ADD solide TINYINT(1) DEFAULT NULL, ADD mixte TINYINT(1) DEFAULT NULL, ADD nonrealise TINYINT(1) DEFAULT NULL, ADD donneeinconnue TINYINT(1) DEFAULT NULL, CHANGE tnm_m tnm_m VARCHAR(100) DEFAULT NULL, CHANGE autre_anapath_post_op autre_anapath_post_op VARCHAR(100) DEFAULT NULL, CHANGE autre_post_tnm_t autre_post_tnm_t VARCHAR(100) DEFAULT NULL, CHANGE autre_post_tnm_n autre_post_tnm_n VARCHAR(100) DEFAULT NULL, CHANGE autre_post_tnm_m autre_post_tnm_m VARCHAR(100) DEFAULT NULL, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm VARCHAR(100) DEFAULT NULL, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op VARCHAR(100) DEFAULT NULL, CHANGE duree_rean duree_rean VARCHAR(100) DEFAULT NULL, CHANGE autre_post_op_suites autre_post_op_suites VARCHAR(100) DEFAULT NULL, CHANGE autre_chirurgien_referent autre_chirurgien_referent VARCHAR(100) DEFAULT NULL, CHANGE file_anapath_post_op file_anapath_post_op VARCHAR(100) DEFAULT NULL, CHANGE file_chirurgie file_chirurgie VARCHAR(100) DEFAULT NULL, CHANGE user_create user_create VARCHAR(100) DEFAULT NULL, CHANGE user_update user_update VARCHAR(100) DEFAULT NULL, CHANGE reste_riques reste_riques VARCHAR(100) DEFAULT NULL, CHANGE chir_txt_libre chir_txt_libre VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP hta, DROP tvi, DROP od, DROP og, DROP aorte, DROP pericard, DROP phreniqued, DROP phreniqueg, DROP wedge, DROP lobectomie, DROP pneug, DROP pneud, DROP avc, DROP ap, DROP obesite, DROP dyslipide, DROP diabete, DROP ins_ren_chr, DROP maladie_thro_vein, DROP cancer, DROP cardiopathie, DROP tabagisme, DROP kystique, DROP non_kystique, DROP solide, DROP mixte, DROP nonrealise, DROP donneeinconnue, CHANGE tnm_m tnm_m VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_anapath_post_op autre_anapath_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_t autre_post_tnm_t VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_n autre_post_tnm_n VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_m autre_post_tnm_m VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duree_rean duree_rean VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_op_suites autre_post_op_suites VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_chirurgien_referent autre_chirurgien_referent VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_anapath_post_op file_anapath_post_op VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_chirurgie file_chirurgie VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_create user_create VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_update user_update VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reste_riques reste_riques VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE chir_txt_libre chir_txt_libre VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
