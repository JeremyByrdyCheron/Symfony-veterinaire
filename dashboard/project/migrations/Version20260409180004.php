<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260409180004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE request');
        $this->addSql('ALTER TABLE document ADD owner_email VARCHAR(255) NOT NULL, ADD url VARCHAR(20) NOT NULL, ADD appointment_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769334AFB9 FOREIGN KEY (appointment_id_id) REFERENCES appointment (id)');
        $this->addSql('CREATE INDEX IDX_D8698A769334AFB9 ON document (appointment_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, animal VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, submitted_date DATE NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, wanted_date DATE NOT NULL, animal_folder_id_id INT NOT NULL, INDEX IDX_3B978F9FA09A5461 (animal_folder_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769334AFB9');
        $this->addSql('DROP INDEX IDX_D8698A769334AFB9 ON document');
        $this->addSql('ALTER TABLE document DROP owner_email, DROP url, DROP appointment_id_id');
    }
}
