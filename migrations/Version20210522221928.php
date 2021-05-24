<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522221928 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier ADD CONSTRAINT FK_9B76551F6C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id)');
        $this->addSql('CREATE INDEX IDX_9B76551F6C2A0A71 ON fichier (enseigne_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier DROP FOREIGN KEY FK_9B76551F6C2A0A71');
        $this->addSql('DROP INDEX IDX_9B76551F6C2A0A71 ON fichier');
    }
}
