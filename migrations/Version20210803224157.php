<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210803224157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('CREATE TABLE affiche (id INT AUTO_INCREMENT NOT NULL, tournoi_id INT NOT NULL, adversaire1_id INT NOT NULL, adversaire2_id INT NOT NULL, resultat VARCHAR(20) DEFAULT NULL, calendrier DATETIME DEFAULT NULL, INDEX IDX_E4314F0DF607770A (tournoi_id), INDEX IDX_E4314F0D1B856D89 (adversaire1_id), INDEX IDX_E4314F0D930C267 (adversaire2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
      //  $this->addSql('ALTER TABLE affiche ADD CONSTRAINT FK_E4314F0DF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        //$this->addSql('ALTER TABLE affiche ADD CONSTRAINT FK_E4314F0D1B856D89 FOREIGN KEY (adversaire1_id) REFERENCES athlete (id)');
        //$this->addSql('ALTER TABLE affiche ADD CONSTRAINT FK_E4314F0D930C267 FOREIGN KEY (adversaire2_id) REFERENCES athlete (id)');
        //$this->addSql('ALTER TABLE sport CHANGE type type ENUM(\'collectif\',\'individuel\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE affiche');
        $this->addSql('ALTER TABLE sport CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
