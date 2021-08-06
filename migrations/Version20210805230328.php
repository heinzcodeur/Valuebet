<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210805230328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athlete ADD ranking_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B832120F64684 FOREIGN KEY (ranking_id) REFERENCES ranking (id)');
        $this->addSql('CREATE INDEX IDX_C03B832120F64684 ON athlete (ranking_id)');
        $this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B832120F64684');
        $this->addSql('DROP INDEX IDX_C03B832120F64684 ON athlete');
        $this->addSql('ALTER TABLE athlete DROP ranking_id');
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
