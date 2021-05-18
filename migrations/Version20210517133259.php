<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517133259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prendre_rdv ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE prendre_rdv ADD CONSTRAINT FK_A0A125B9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A0A125B9A76ED395 ON prendre_rdv (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prendre_rdv DROP FOREIGN KEY FK_A0A125B9A76ED395');
        $this->addSql('DROP INDEX IDX_A0A125B9A76ED395 ON prendre_rdv');
        $this->addSql('ALTER TABLE prendre_rdv DROP user_id');
    }
}
