<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803194525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B8321A513A63E');
        $this->addSql('DROP INDEX IDX_C03B8321A513A63E ON athlete');
        $this->addSql('ALTER TABLE athlete ADD ranking INT DEFAULT NULL, CHANGE classement_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B832112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_C03B832112469DE2 ON athlete (category_id)');
        $this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B832112469DE2');
        $this->addSql('DROP INDEX IDX_C03B832112469DE2 ON athlete');
        $this->addSql('ALTER TABLE athlete ADD classement_id INT DEFAULT NULL, DROP category_id, DROP ranking');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B8321A513A63E FOREIGN KEY (classement_id) REFERENCES classement (id)');
        $this->addSql('CREATE INDEX IDX_C03B8321A513A63E ON athlete (classement_id)');
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
