<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517145036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestation_services_enseigne (prestation_services_id INT NOT NULL, enseigne_id INT NOT NULL, INDEX IDX_923B8FE6FC497BF0 (prestation_services_id), INDEX IDX_923B8FE66C2A0A71 (enseigne_id), PRIMARY KEY(prestation_services_id, enseigne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation_services_enseigne ADD CONSTRAINT FK_923B8FE6FC497BF0 FOREIGN KEY (prestation_services_id) REFERENCES prestation_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_services_enseigne ADD CONSTRAINT FK_923B8FE66C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE prestation_services_enseigne');
    }
}
