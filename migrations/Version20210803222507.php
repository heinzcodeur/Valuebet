<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803222507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rencontre_athlete (rencontre_id INT NOT NULL, athlete_id INT NOT NULL, INDEX IDX_F68CB58B6CFC0818 (rencontre_id), INDEX IDX_F68CB58BFE6BCB8B (athlete_id), PRIMARY KEY(rencontre_id, athlete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rencontre_athlete ADD CONSTRAINT FK_F68CB58B6CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rencontre_athlete ADD CONSTRAINT FK_F68CB58BFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athlete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE athlete DROP FOREIGN KEY FK_C03B83216CFC0818');
        $this->addSql('DROP INDEX IDX_C03B83216CFC0818 ON athlete');
        $this->addSql('ALTER TABLE athlete DROP rencontre_id');
        $this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rencontre_athlete');
        $this->addSql('ALTER TABLE athlete ADD rencontre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE athlete ADD CONSTRAINT FK_C03B83216CFC0818 FOREIGN KEY (rencontre_id) REFERENCES rencontre (id)');
        $this->addSql('CREATE INDEX IDX_C03B83216CFC0818 ON athlete (rencontre_id)');
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
