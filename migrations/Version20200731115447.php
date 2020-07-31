<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200731115447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD autre_anapath_post_op VARCHAR(100) DEFAULT NULL, ADD autre_post_tnm_t VARCHAR(100) DEFAULT NULL, ADD autre_post_tnm_n VARCHAR(100) DEFAULT NULL, ADD autre_post_tnm_m VARCHAR(100) DEFAULT NULL, ADD autre_post_tnm_stade_ctnm VARCHAR(100) DEFAULT NULL, ADD autre_rea_usc_post_op VARCHAR(100) DEFAULT NULL, ADD duree_rean VARCHAR(100) DEFAULT NULL, ADD autre_post_op_suites VARCHAR(100) DEFAULT NULL, ADD autre_chirurgien_referent VARCHAR(100) DEFAULT NULL, ADD file_anapath_post_op VARCHAR(100) DEFAULT NULL, ADD file_chirurgie VARCHAR(100) DEFAULT NULL, ADD date_create DATETIME NOT NULL, ADD date_update DATETIME DEFAULT NULL, ADD user_create VARCHAR(100) DEFAULT NULL, ADD user_update VARCHAR(100) DEFAULT NULL, ADD reste_riques VARCHAR(100) DEFAULT NULL, ADD chir_txt_libre VARCHAR(100) DEFAULT NULL, CHANGE poids poids DOUBLE PRECISION DEFAULT NULL, CHANGE taille taille DOUBLE PRECISION DEFAULT NULL, CHANGE tnm_m tnm_m VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP autre_anapath_post_op, DROP autre_post_tnm_t, DROP autre_post_tnm_n, DROP autre_post_tnm_m, DROP autre_post_tnm_stade_ctnm, DROP autre_rea_usc_post_op, DROP duree_rean, DROP autre_post_op_suites, DROP autre_chirurgien_referent, DROP file_anapath_post_op, DROP file_chirurgie, DROP date_create, DROP date_update, DROP user_create, DROP user_update, DROP reste_riques, DROP chir_txt_libre, CHANGE poids poids DOUBLE PRECISION NOT NULL, CHANGE taille taille DOUBLE PRECISION NOT NULL, CHANGE tnm_m tnm_m VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
