<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216184912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, destination_id INT NOT NULL, idclient_id INT NOT NULL, demande_event_id INT NOT NULL, INDEX IDX_8F91ABF0816C6140 (destination_id), UNIQUE INDEX UNIQ_8F91ABF067F0C0D4 (idclient_id), INDEX IDX_8F91ABF037AEA149 (demande_event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billet (id INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_1F034AF6B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billet_evenement (id INT AUTO_INCREMENT NOT NULL, demande_event_id INT NOT NULL, INDEX IDX_F4D578037AEA149 (demande_event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cout_destination (id INT AUTO_INCREMENT NOT NULL, destination_id INT NOT NULL, INDEX IDX_E5AB755F816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delegation (id INT AUTO_INCREMENT NOT NULL, gouvernorat_id INT NOT NULL, INDEX IDX_292F436D75B74E2D (gouvernorat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_evenement (id INT AUTO_INCREMENT NOT NULL, id_client_id INT NOT NULL, destination_id INT NOT NULL, INDEX IDX_7E0A92CB99DED506 (id_client_id), INDEX IDX_7E0A92CB816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, souscategorie_id INT NOT NULL, INDEX IDX_3EC63EAAA27126E0 (souscategorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gouvernorat (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, demande_event_id INT NOT NULL, INDEX IDX_42C8495537AEA149 (demande_event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categorie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_52743D7BBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF067F0C0D4 FOREIGN KEY (idclient_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF037AEA149 FOREIGN KEY (demande_event_id) REFERENCES demande_evenement (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE billet_evenement ADD CONSTRAINT FK_F4D578037AEA149 FOREIGN KEY (demande_event_id) REFERENCES demande_evenement (id)');
        $this->addSql('ALTER TABLE cout_destination ADD CONSTRAINT FK_E5AB755F816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE delegation ADD CONSTRAINT FK_292F436D75B74E2D FOREIGN KEY (gouvernorat_id) REFERENCES gouvernorat (id)');
        $this->addSql('ALTER TABLE demande_evenement ADD CONSTRAINT FK_7E0A92CB99DED506 FOREIGN KEY (id_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE demande_evenement ADD CONSTRAINT FK_7E0A92CB816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA27126E0 FOREIGN KEY (souscategorie_id) REFERENCES sous_categorie (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495537AEA149 FOREIGN KEY (demande_event_id) REFERENCES demande_evenement (id)');
        $this->addSql('ALTER TABLE sous_categorie ADD CONSTRAINT FK_52743D7BBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_categorie DROP FOREIGN KEY FK_52743D7BBCF5E72D');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF037AEA149');
        $this->addSql('ALTER TABLE billet_evenement DROP FOREIGN KEY FK_F4D578037AEA149');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495537AEA149');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0816C6140');
        $this->addSql('ALTER TABLE cout_destination DROP FOREIGN KEY FK_E5AB755F816C6140');
        $this->addSql('ALTER TABLE demande_evenement DROP FOREIGN KEY FK_7E0A92CB816C6140');
        $this->addSql('ALTER TABLE delegation DROP FOREIGN KEY FK_292F436D75B74E2D');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6B83297E7');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAA27126E0');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF067F0C0D4');
        $this->addSql('ALTER TABLE demande_evenement DROP FOREIGN KEY FK_7E0A92CB99DED506');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE billet');
        $this->addSql('DROP TABLE billet_evenement');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cout_destination');
        $this->addSql('DROP TABLE delegation');
        $this->addSql('DROP TABLE demande_evenement');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE gouvernorat');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE sous_categorie');
        $this->addSql('DROP TABLE utilisateur');
    }
}
