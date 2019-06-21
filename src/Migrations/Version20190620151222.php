<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190620151222 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, tva_id INT DEFAULT NULL, designation VARCHAR(255) DEFAULT NULL, prix_ht NUMERIC(6, 3) NOT NULL, prix_ttc NUMERIC(6, 3) DEFAULT NULL, disponibilit TINYINT(1) DEFAULT NULL, unit VARCHAR(15) DEFAULT NULL, bar_code VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E664D79775F (tva_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bon_sortie (id INT AUTO_INCREMENT NOT NULL, stock_voiture_id INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, qte_sortie INT DEFAULT NULL, INDEX IDX_2843ABC8AFC85F16 (stock_voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, raison_social VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commands (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, commercial_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_9A3E132C19EB6921 (client_id), INDEX IDX_9A3E132C7854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (id INT AUTO_INCREMENT NOT NULL, stock_voiture_id INT DEFAULT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(25) DEFAULT NULL, prenom VARCHAR(25) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, age INT DEFAULT NULL, UNIQUE INDEX UNIQ_7653F3AEAFC85F16 (stock_voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_stock (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, qte_dep INT DEFAULT NULL, adresse_dep VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, commercial_id INT DEFAULT NULL, date_saisie DATE DEFAULT NULL, prix_total NUMERIC(10, 3) DEFAULT NULL, INDEX IDX_FE86641019EB6921 (client_id), INDEX IDX_FE8664107854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventaire (id INT AUTO_INCREMENT NOT NULL, depot_id INT DEFAULT NULL, date_inv DATETIME DEFAULT NULL, INDEX IDX_338920E08510D4DE (depot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_bon_sortie (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, bon_sortie_id INT DEFAULT NULL, qte_art INT DEFAULT NULL, INDEX IDX_CBEF45D57294869C (article_id), INDEX IDX_CBEF45D55BDB77E8 (bon_sortie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_command (id INT AUTO_INCREMENT NOT NULL, command_id INT DEFAULT NULL, article_id INT DEFAULT NULL, qte INT DEFAULT NULL, INDEX IDX_1153D4ED33E1689A (command_id), INDEX IDX_1153D4ED7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_demande_stock (id INT AUTO_INCREMENT NOT NULL, demande_stock_id INT DEFAULT NULL, article_id INT DEFAULT NULL, qte INT DEFAULT NULL, INDEX IDX_B68BD4284B9428D2 (demande_stock_id), INDEX IDX_B68BD4287294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_facture (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, facture_id INT NOT NULL, qte INT DEFAULT NULL, prix_tt NUMERIC(6, 3) DEFAULT NULL, remise SMALLINT DEFAULT NULL, prix_uht NUMERIC(6, 3) DEFAULT NULL, tva SMALLINT DEFAULT NULL, INDEX IDX_611F5A297294869C (article_id), INDEX IDX_611F5A297F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_inventaire (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, qte_inv INT DEFAULT NULL, INDEX IDX_D025CEFD7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_reglement (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, reglement_id INT DEFAULT NULL, prix_restant INT DEFAULT NULL, INDEX IDX_2401CEC47F2DEE08 (facture_id), INDEX IDX_2401CEC46A477111 (reglement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece_reglement (id INT AUTO_INCREMENT NOT NULL, reglement_id INT DEFAULT NULL, type_regl VARCHAR(15) DEFAULT NULL, INDEX IDX_DB654CCA6A477111 (reglement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, dat_regl DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, depot_id INT DEFAULT NULL, article_id INT DEFAULT NULL, quantity_stock INT DEFAULT NULL, INDEX IDX_4B3656608510D4DE (depot_id), INDEX IDX_4B3656607294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock_voitures (id INT AUTO_INCREMENT NOT NULL, qte_v VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) DEFAULT NULL, valeur SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, commercial_id INT DEFAULT NULL, date_visite DATE DEFAULT NULL, remarques VARCHAR(255) DEFAULT NULL, INDEX IDX_B09C8CBB19EB6921 (client_id), INDEX IDX_B09C8CBB7854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE bon_sortie ADD CONSTRAINT FK_2843ABC8AFC85F16 FOREIGN KEY (stock_voiture_id) REFERENCES stock_voitures (id)');
        $this->addSql('ALTER TABLE commands ADD CONSTRAINT FK_9A3E132C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commands ADD CONSTRAINT FK_9A3E132C7854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE commercial ADD CONSTRAINT FK_7653F3AEAFC85F16 FOREIGN KEY (stock_voiture_id) REFERENCES stock_voitures (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664107854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE inventaire ADD CONSTRAINT FK_338920E08510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('ALTER TABLE ligne_bon_sortie ADD CONSTRAINT FK_CBEF45D57294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_bon_sortie ADD CONSTRAINT FK_CBEF45D55BDB77E8 FOREIGN KEY (bon_sortie_id) REFERENCES bon_sortie (id)');
        $this->addSql('ALTER TABLE ligne_command ADD CONSTRAINT FK_1153D4ED33E1689A FOREIGN KEY (command_id) REFERENCES commands (id)');
        $this->addSql('ALTER TABLE ligne_command ADD CONSTRAINT FK_1153D4ED7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_demande_stock ADD CONSTRAINT FK_B68BD4284B9428D2 FOREIGN KEY (demande_stock_id) REFERENCES demande_stock (id)');
        $this->addSql('ALTER TABLE ligne_demande_stock ADD CONSTRAINT FK_B68BD4287294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A297294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_facture ADD CONSTRAINT FK_611F5A297F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE ligne_inventaire ADD CONSTRAINT FK_D025CEFD7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE ligne_reglement ADD CONSTRAINT FK_2401CEC47F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE ligne_reglement ADD CONSTRAINT FK_2401CEC46A477111 FOREIGN KEY (reglement_id) REFERENCES reglement (id)');
        $this->addSql('ALTER TABLE piece_reglement ADD CONSTRAINT FK_DB654CCA6A477111 FOREIGN KEY (reglement_id) REFERENCES reglement (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656608510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B3656607294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB7854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_bon_sortie DROP FOREIGN KEY FK_CBEF45D57294869C');
        $this->addSql('ALTER TABLE ligne_command DROP FOREIGN KEY FK_1153D4ED7294869C');
        $this->addSql('ALTER TABLE ligne_demande_stock DROP FOREIGN KEY FK_B68BD4287294869C');
        $this->addSql('ALTER TABLE ligne_facture DROP FOREIGN KEY FK_611F5A297294869C');
        $this->addSql('ALTER TABLE ligne_inventaire DROP FOREIGN KEY FK_D025CEFD7294869C');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B3656607294869C');
        $this->addSql('ALTER TABLE ligne_bon_sortie DROP FOREIGN KEY FK_CBEF45D55BDB77E8');
        $this->addSql('ALTER TABLE commands DROP FOREIGN KEY FK_9A3E132C19EB6921');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641019EB6921');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB19EB6921');
        $this->addSql('ALTER TABLE ligne_command DROP FOREIGN KEY FK_1153D4ED33E1689A');
        $this->addSql('ALTER TABLE commands DROP FOREIGN KEY FK_9A3E132C7854071C');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664107854071C');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB7854071C');
        $this->addSql('ALTER TABLE ligne_demande_stock DROP FOREIGN KEY FK_B68BD4284B9428D2');
        $this->addSql('ALTER TABLE inventaire DROP FOREIGN KEY FK_338920E08510D4DE');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B3656608510D4DE');
        $this->addSql('ALTER TABLE ligne_facture DROP FOREIGN KEY FK_611F5A297F2DEE08');
        $this->addSql('ALTER TABLE ligne_reglement DROP FOREIGN KEY FK_2401CEC47F2DEE08');
        $this->addSql('ALTER TABLE ligne_reglement DROP FOREIGN KEY FK_2401CEC46A477111');
        $this->addSql('ALTER TABLE piece_reglement DROP FOREIGN KEY FK_DB654CCA6A477111');
        $this->addSql('ALTER TABLE bon_sortie DROP FOREIGN KEY FK_2843ABC8AFC85F16');
        $this->addSql('ALTER TABLE commercial DROP FOREIGN KEY FK_7653F3AEAFC85F16');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D79775F');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bon_sortie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commands');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE demande_stock');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE inventaire');
        $this->addSql('DROP TABLE ligne_bon_sortie');
        $this->addSql('DROP TABLE ligne_command');
        $this->addSql('DROP TABLE ligne_demande_stock');
        $this->addSql('DROP TABLE ligne_facture');
        $this->addSql('DROP TABLE ligne_inventaire');
        $this->addSql('DROP TABLE ligne_reglement');
        $this->addSql('DROP TABLE piece_reglement');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE stock_voitures');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP TABLE visite');
    }
}
