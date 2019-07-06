<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190621162621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commercial ADD voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commercial ADD CONSTRAINT FK_7653F3AE181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7653F3AE181A8BA ON commercial (voiture_id)');
        $this->addSql('ALTER TABLE stock_voitures DROP voiture_id');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F7854071C');
        $this->addSql('DROP INDEX UNIQ_E9E2810F7854071C ON voiture');
        $this->addSql('ALTER TABLE voiture CHANGE commercial_id stock_voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FAFC85F16 FOREIGN KEY (stock_voiture_id) REFERENCES stock_voitures (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9E2810FAFC85F16 ON voiture (stock_voiture_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commercial DROP FOREIGN KEY FK_7653F3AE181A8BA');
        $this->addSql('DROP INDEX UNIQ_7653F3AE181A8BA ON commercial');
        $this->addSql('ALTER TABLE commercial DROP voiture_id');
        $this->addSql('ALTER TABLE stock_voitures ADD voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FAFC85F16');
        $this->addSql('DROP INDEX UNIQ_E9E2810FAFC85F16 ON voiture');
        $this->addSql('ALTER TABLE voiture CHANGE stock_voiture_id commercial_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F7854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E9E2810F7854071C ON voiture (commercial_id)');
    }
}
