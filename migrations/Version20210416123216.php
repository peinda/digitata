<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416123216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, politique_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, username VARCHAR(50) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, administrateur TINYINT(1) NOT NULL, actif TINYINT(1) NOT NULL, activation_token VARCHAR(50) DEFAULT NULL, reset_token VARCHAR(50) DEFAULT NULL, cgu TINYINT(1) DEFAULT NULL, pc TINYINT(1) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_88BDF3E9F85E0677 (username), UNIQUE INDEX UNIQ_88BDF3E9E7927C74 (email), INDEX IDX_88BDF3E9F528CAF0 (politique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidats (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, mobile VARCHAR(20) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, motivation VARCHAR(255) DEFAULT NULL, brochure_filename VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3C663B15E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidats_offres (candidats_id INT NOT NULL, offres_id INT NOT NULL, INDEX IDX_C84B5334E4CF8FC2 (candidats_id), INDEX IDX_C84B53346C83CD9F (offres_id), PRIMARY KEY(candidats_id, offres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offres (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(255) NOT NULL, pole VARCHAR(100) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, contrat_type VARCHAR(10) DEFAULT NULL, payment VARCHAR(10) DEFAULT NULL, skills VARCHAR(455) DEFAULT NULL, poste_recherche VARCHAR(255) DEFAULT NULL, beggining_at DATE DEFAULT NULL, published_at DATETIME DEFAULT NULL, description VARCHAR(855) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE politique (id INT AUTO_INCREMENT NOT NULL, pc VARCHAR(250) NOT NULL, cgu VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9F528CAF0 FOREIGN KEY (politique_id) REFERENCES politique (id)');
        $this->addSql('ALTER TABLE candidats_offres ADD CONSTRAINT FK_C84B5334E4CF8FC2 FOREIGN KEY (candidats_id) REFERENCES candidats (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidats_offres ADD CONSTRAINT FK_C84B53346C83CD9F FOREIGN KEY (offres_id) REFERENCES offres (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats_offres DROP FOREIGN KEY FK_C84B5334E4CF8FC2');
        $this->addSql('ALTER TABLE candidats_offres DROP FOREIGN KEY FK_C84B53346C83CD9F');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9F528CAF0');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('DROP TABLE candidats');
        $this->addSql('DROP TABLE candidats_offres');
        $this->addSql('DROP TABLE offres');
        $this->addSql('DROP TABLE politique');
    }
}
