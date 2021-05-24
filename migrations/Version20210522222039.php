<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522222039 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation_services ADD enseigne_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_services ADD CONSTRAINT FK_FA225C7A6C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id)');
        $this->addSql('CREATE INDEX IDX_FA225C7A6C2A0A71 ON prestation_services (enseigne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation_services DROP FOREIGN KEY FK_FA225C7A6C2A0A71');
        $this->addSql('DROP INDEX IDX_FA225C7A6C2A0A71 ON prestation_services');
        $this->addSql('ALTER TABLE prestation_services DROP enseigne_id');
    }
}
