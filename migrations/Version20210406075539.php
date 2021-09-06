<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406075539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_user ADD politique_id INT NOT NULL');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9F528CAF0 FOREIGN KEY (politique_id) REFERENCES politique (id)');
        $this->addSql('CREATE INDEX IDX_88BDF3E9F528CAF0 ON app_user (politique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9F528CAF0');
        $this->addSql('DROP INDEX IDX_88BDF3E9F528CAF0 ON app_user');
        $this->addSql('ALTER TABLE app_user DROP politique_id');
    }
}
