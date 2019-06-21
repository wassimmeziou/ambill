<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620160912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_voitures ADD quantite_stock_voiture INT NOT NULL, DROP qte_v');
        $this->addSql('ALTER TABLE depot CHANGE qte_dep quantite_depot INT DEFAULT NULL, CHANGE adresse_dep adresse_depot VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depot CHANGE quantite_depot qte_dep INT DEFAULT NULL, CHANGE adresse_depot adresse_dep VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE stock_voitures ADD qte_v VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP quantite_stock_voiture');
    }
}
