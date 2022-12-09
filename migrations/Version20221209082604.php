<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221209082604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE documents');
        $this->addSql('ALTER TABLE patients CHANGE Sexe Sexe VARCHAR(1) DEFAULT NULL, CHANGE Num_Secu Num_Secu VARCHAR(15) DEFAULT \'NULL\', CHANGE Code_Motif Code_Motif INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patients RENAME INDEX fk_motifs TO fk_motif');
        $this->addSql('CREATE INDEX py_idx1 ON pays (Code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documents (ID_Document INT AUTO_INCREMENT NOT NULL, ID_Patient INT NOT NULL, Chemin VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Nature VARCHAR(15) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, Extension VARCHAR(3) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, INDEX fk_pat_doc (ID_Patient), PRIMARY KEY(ID_Document)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2CE51A4223');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2C6CDE10B2');
        $this->addSql('ALTER TABLE patients CHANGE Num_Secu Num_Secu VARCHAR(15) DEFAULT NULL, CHANGE Code_Motif Code_Motif VARCHAR(1) NOT NULL, CHANGE Sexe Sexe VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE patients RENAME INDEX fk_motif TO fk_motifs');
        $this->addSql('DROP INDEX py_idx1 ON pays');
    }
}
