<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620162005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stock_voitures ADD commercial_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock_voitures ADD CONSTRAINT FK_C49E64597854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C49E64597854071C ON stock_voitures (commercial_id)');
        $this->addSql('ALTER TABLE demande_stock ADD comercial_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_stock ADD CONSTRAINT FK_BDE8D549E2AAC521 FOREIGN KEY (comercial_id) REFERENCES commercial (id)');
        $this->addSql('CREATE INDEX IDX_BDE8D549E2AAC521 ON demande_stock (comercial_id)');
        $this->addSql('ALTER TABLE commercial DROP FOREIGN KEY FK_7653F3AEAFC85F16');
        $this->addSql('DROP INDEX UNIQ_7653F3AEAFC85F16 ON commercial');
        $this->addSql('ALTER TABLE commercial DROP stock_voiture_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commercial ADD stock_voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commercial ADD CONSTRAINT FK_7653F3AEAFC85F16 FOREIGN KEY (stock_voiture_id) REFERENCES stock_voitures (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7653F3AEAFC85F16 ON commercial (stock_voiture_id)');
        $this->addSql('ALTER TABLE demande_stock DROP FOREIGN KEY FK_BDE8D549E2AAC521');
        $this->addSql('DROP INDEX IDX_BDE8D549E2AAC521 ON demande_stock');
        $this->addSql('ALTER TABLE demande_stock DROP comercial_id');
        $this->addSql('ALTER TABLE stock_voitures DROP FOREIGN KEY FK_C49E64597854071C');
        $this->addSql('DROP INDEX UNIQ_C49E64597854071C ON stock_voitures');
        $this->addSql('ALTER TABLE stock_voitures DROP commercial_id');
    }
}
