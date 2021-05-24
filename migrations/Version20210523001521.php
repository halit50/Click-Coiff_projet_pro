<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210523001521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier CHANGE enseigne_id enseigne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation_services CHANGE enseigne_id enseigne_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier CHANGE enseigne_id enseigne_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_services CHANGE enseigne_id enseigne_id INT NOT NULL');
    }
}
