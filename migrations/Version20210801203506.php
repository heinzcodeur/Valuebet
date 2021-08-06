<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210801203506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
        $this->addSql('ALTER TABLE tournoi ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFA73F0036 FOREIGN KEY (ville_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFA73F0036 ON tournoi (ville_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFA73F0036');
        $this->addSql('DROP INDEX IDX_18AFD9DFA73F0036 ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP ville_id');
    }
}
