<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412083801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidats (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, mobile INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, motivation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidats_offres (candidats_id INT NOT NULL, offres_id INT NOT NULL, INDEX IDX_C84B5334E4CF8FC2 (candidats_id), INDEX IDX_C84B53346C83CD9F (offres_id), PRIMARY KEY(candidats_id, offres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidats_offres ADD CONSTRAINT FK_C84B5334E4CF8FC2 FOREIGN KEY (candidats_id) REFERENCES candidats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidats_offres ADD CONSTRAINT FK_C84B53346C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats_offres DROP FOREIGN KEY FK_C84B5334E4CF8FC2');
        $this->addSql('DROP TABLE candidats');
        $this->addSql('DROP TABLE candidats_offres');
    }
}
