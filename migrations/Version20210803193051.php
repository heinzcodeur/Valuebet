<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803193051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classement DROP FOREIGN KEY FK_55EE9D6DE6ADA943');
        $this->addSql('DROP INDEX IDX_55EE9D6DE6ADA943 ON classement');
        $this->addSql('ALTER TABLE classement DROP cat_id, DROP ranking');
        $this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classement ADD cat_id INT DEFAULT NULL, ADD ranking INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classement ADD CONSTRAINT FK_55EE9D6DE6ADA943 FOREIGN KEY (cat_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_55EE9D6DE6ADA943 ON classement (cat_id)');
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
