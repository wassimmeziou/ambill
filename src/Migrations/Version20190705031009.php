<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190705031009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_voitures ADD article_id INT DEFAULT NULL, ADD nom_article VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stock_voitures ADD CONSTRAINT FK_C49E64597294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_C49E64597294869C ON stock_voitures (article_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_voitures DROP FOREIGN KEY FK_C49E64597294869C');
        $this->addSql('DROP INDEX IDX_C49E64597294869C ON stock_voitures');
        $this->addSql('ALTER TABLE stock_voitures DROP article_id, DROP nom_article');
    }
}
