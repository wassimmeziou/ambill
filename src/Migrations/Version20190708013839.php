<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708013839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_bon_sortie DROP FOREIGN KEY FK_CBEF45D57294869C');
        $this->addSql('ALTER TABLE ligne_bon_sortie ADD CONSTRAINT FK_CBEF45D57294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_command DROP FOREIGN KEY FK_1153D4ED7294869C');
        $this->addSql('ALTER TABLE ligne_command ADD CONSTRAINT FK_1153D4ED7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_demande_stock DROP FOREIGN KEY FK_B68BD4287294869C');
        $this->addSql('ALTER TABLE ligne_demande_stock ADD CONSTRAINT FK_B68BD4287294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_facture DROP FOREIGN KEY FK_611F5A297294869C');
        $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A297294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_inventaire DROP FOREIGN KEY FK_D025CEFD7294869C');
        $this->addSql('ALTER TABLE ligne_inventaire ADD CONSTRAINT FK_D025CEFD7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE ligne_bon_sortie DROP FOREIGN KEY FK_CBEF45D57294869C');
        $this->addSql('ALTER TABLE ligne_bon_sortie ADD CONSTRAINT FK_CBEF45D57294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_command DROP FOREIGN KEY FK_1153D4ED7294869C');
        $this->addSql('ALTER TABLE ligne_command ADD CONSTRAINT FK_1153D4ED7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_demande_stock DROP FOREIGN KEY FK_B68BD4287294869C');
        $this->addSql('ALTER TABLE ligne_demande_stock ADD CONSTRAINT FK_B68BD4287294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_facture DROP FOREIGN KEY FK_611F5A297294869C');
        $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A297294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_inventaire DROP FOREIGN KEY FK_D025CEFD7294869C');
        $this->addSql('ALTER TABLE ligne_inventaire ADD CONSTRAINT FK_D025CEFD7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }
}
