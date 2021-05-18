<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517144838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creneau_enseigne (creneau_id INT NOT NULL, enseigne_id INT NOT NULL, INDEX IDX_605514CB7D0729A9 (creneau_id), INDEX IDX_605514CB6C2A0A71 (enseigne_id), PRIMARY KEY(creneau_id, enseigne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creneau_enseigne ADD CONSTRAINT FK_605514CB7D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creneau_enseigne ADD CONSTRAINT FK_605514CB6C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE creneau_enseigne');
    }
}
