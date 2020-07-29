<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200729143610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD score_charlson VARCHAR(255) DEFAULT NULL, ADD autre_histo_pre_op VARCHAR(255) DEFAULT NULL, ADD autre_mode_obt_his_pre_ope VARCHAR(255) DEFAULT NULL, ADD autre_cons_neu_dep_mg_pre_op VARCHAR(255) DEFAULT NULL, ADD trai_fond_myasthenie VARCHAR(100) DEFAULT NULL, ADD autre_trai_fond_myasthenie VARCHAR(255) DEFAULT NULL, ADD autre_irm VARCHAR(255) DEFAULT NULL, ADD autre_tdm VARCHAR(100) DEFAULT NULL, ADD autre_petscan VARCHAR(255) DEFAULT NULL, ADD autre_tnm_t VARCHAR(255) DEFAULT NULL, ADD autre_tnm_n VARCHAR(255) DEFAULT NULL, ADD autre_tnm_m VARCHAR(255) DEFAULT NULL, ADD autre_stade VARCHAR(255) DEFAULT NULL, ADD autre_chir_geste VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP score_charlson, DROP autre_histo_pre_op, DROP autre_mode_obt_his_pre_ope, DROP autre_cons_neu_dep_mg_pre_op, DROP trai_fond_myasthenie, DROP autre_trai_fond_myasthenie, DROP autre_irm, DROP autre_tdm, DROP autre_petscan, DROP autre_tnm_t, DROP autre_tnm_n, DROP autre_tnm_m, DROP autre_stade, DROP autre_chir_geste');
    }
}
