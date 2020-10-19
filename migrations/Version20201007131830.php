<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007131830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD co_chirurgie TINYINT(1) DEFAULT NULL, ADD co_diabete TINYINT(1) DEFAULT NULL, ADD co_chirurgie_txt VARCHAR(50) DEFAULT NULL, ADD co_diabete_txt VARCHAR(50) DEFAULT NULL, ADD co_respiratoire TINYINT(1) DEFAULT NULL, ADD co_respiratoire_txt VARCHAR(50) DEFAULT NULL, ADD epp_autre VARCHAR(100) DEFAULT NULL, ADD anticr_autre VARCHAR(100) DEFAULT NULL, ADD tdm_autre VARCHAR(100) DEFAULT NULL, ADD petscan_autre VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE case_cochee_multiple DROP FOREIGN KEY FK_1E5E006F6B899279');
        $this->addSql('ALTER TABLE patient DROP co_chirurgie, DROP co_diabete, DROP co_chirurgie_txt, DROP co_diabete_txt, DROP co_respiratoire, DROP co_respiratoire_txt, DROP epp_autre, DROP anticr_autre, DROP tdm_autre, DROP petscan_autre, CHANGE tnm_m tnm_m TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_anapath_post_op autre_anapath_post_op TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_t autre_post_tnm_t TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_n autre_post_tnm_n TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_m autre_post_tnm_m TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_tnm_stade_ctnm autre_post_tnm_stade_ctnm TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_rea_usc_post_op autre_rea_usc_post_op TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duree_rean duree_rean TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_post_op_suites autre_post_op_suites TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_chirurgien_referent autre_chirurgien_referent TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_anapath_post_op file_anapath_post_op TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_chirurgie file_chirurgie TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_create user_create TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_update user_update TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reste_riques reste_riques TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE chir_txt_libre chir_txt_libre TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
