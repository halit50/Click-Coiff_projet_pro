<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517134722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prendre_rdv ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE prendre_rdv ADD CONSTRAINT FK_A0A125B94DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresses (id)');
        $this->addSql('CREATE INDEX IDX_A0A125B94DE7DC5C ON prendre_rdv (adresse_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prendre_rdv DROP FOREIGN KEY FK_A0A125B94DE7DC5C');
        $this->addSql('DROP INDEX IDX_A0A125B94DE7DC5C ON prendre_rdv');
        $this->addSql('ALTER TABLE prendre_rdv DROP adresse_id');
    }
}
