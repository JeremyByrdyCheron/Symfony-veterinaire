<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260410071617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD owner_email VARCHAR(255) NOT NULL, ADD appointment_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769334AFB9 FOREIGN KEY (appointment_id_id) REFERENCES appointment (id)');
        $this->addSql('CREATE INDEX IDX_D8698A769334AFB9 ON document (appointment_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769334AFB9');
        $this->addSql('DROP INDEX IDX_D8698A769334AFB9 ON document');
        $this->addSql('ALTER TABLE document DROP owner_email, DROP appointment_id_id');
    }
}
