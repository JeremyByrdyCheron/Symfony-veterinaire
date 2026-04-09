<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260408170824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_folder (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, inscription_date DATE NOT NULL, veterinary_id_id INT NOT NULL, INDEX IDX_5653CC11450FF95C (veterinary_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, pdf VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, token VARCHAR(255) NOT NULL, animal_id_id INT NOT NULL, INDEX IDX_D8698A765EB747A3 (animal_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, animal VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, submitted_date DATE NOT NULL, description LONGTEXT NOT NULL, wanted_date DATE NOT NULL, animal_folder_id_id INT NOT NULL, INDEX IDX_3B978F9FA09A5461 (animal_folder_id_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number BIGINT NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE animal_folder ADD CONSTRAINT FK_5653CC11450FF95C FOREIGN KEY (veterinary_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A765EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animal_folder (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FA09A5461 FOREIGN KEY (animal_folder_id_id) REFERENCES animal_folder (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_folder DROP FOREIGN KEY FK_5653CC11450FF95C');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A765EB747A3');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FA09A5461');
        $this->addSql('DROP TABLE animal_folder');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
