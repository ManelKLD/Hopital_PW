<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118140806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, date_naiss DATE NOT NULL, num_secu VARCHAR(255) DEFAULT NULL, code_pays VARCHAR(255) NOT NULL, date_entree DATE NOT NULL, code_motif SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY fk_sexe');
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY fk_motif');
        $this->addSql('DROP TABLE motifs');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE sexe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE motifs (Code INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(Code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE patients (Code INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Sexe VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Date_Naiss DATE NOT NULL, Num_Secu VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, Code_Pays VARCHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Date_Entree DATE NOT NULL, Code_Motif INT NOT NULL, INDEX fk_sexe (Sexe), INDEX fk_pays (Code_Pays), INDEX fk_motif (Code_Motif), PRIMARY KEY(Code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pays (Code VARCHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Libelle VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX py_idx1 (Code), PRIMARY KEY(Code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sexe (Code VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Libelle VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(Code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT fk_sexe FOREIGN KEY (Sexe) REFERENCES sexe (Code) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT fk_motif FOREIGN KEY (Code_Motif) REFERENCES motifs (Code) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
