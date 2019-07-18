<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709023456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE etat_facture (id INT AUTO_INCREMENT NOT NULL, ref VARCHAR(3) DEFAULT NULL, description VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD etat_id INT DEFAULT NULL, DROP etat');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410D5E86FF FOREIGN KEY (etat_id) REFERENCES etat_facture (id)');
        $this->addSql('CREATE INDEX IDX_FE866410D5E86FF ON facture (etat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410D5E86FF');
        $this->addSql('DROP TABLE etat_facture');
        $this->addSql('DROP INDEX IDX_FE866410D5E86FF ON facture');
        $this->addSql('ALTER TABLE facture ADD etat VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP etat_id');
    }
}
