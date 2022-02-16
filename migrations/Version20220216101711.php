<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216101711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, avis VARCHAR(255) NOT NULL, note DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billet (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billet_evenement (id INT AUTO_INCREMENT NOT NULL, id_billet_evenement_id INT DEFAULT NULL, categorie VARCHAR(255) NOT NULL, nb_billet INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_F4D57803C09B4CA (id_billet_evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_497DD6349F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cout_destination (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, capacitã© INT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_evenement (id INT AUTO_INCREMENT NOT NULL, id_evenement_id INT NOT NULL, id_enement_id INT DEFAULT NULL, id_demande_evenement_id INT DEFAULT NULL, date_demande DATE NOT NULL, statu VARCHAR(255) NOT NULL, description_demande VARCHAR(255) NOT NULL, date_debut_ev DATE NOT NULL, date_fin_ev DATE NOT NULL, heure_debut_ev VARCHAR(255) NOT NULL, heure_fin_ev TIME NOT NULL, nb_billet VARCHAR(255) NOT NULL, description_evenement VARCHAR(255) NOT NULL, INDEX IDX_7E0A92CB2C115A61 (id_evenement_id), INDEX IDX_7E0A92CB94638275 (id_enement_id), INDEX IDX_7E0A92CB54E94CCD (id_demande_evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, id_destination_id INT NOT NULL, INDEX IDX_3EC63EAABC0ADC46 (id_destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, id_region_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_F62F1761813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_reservation_id INT DEFAULT NULL, date_reservation DATE NOT NULL, heure_reservation TIME NOT NULL, statu VARCHAR(255) NOT NULL, cout DOUBLE PRECISION NOT NULL, INDEX IDX_42C8495585542AE1 (id_reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categorie (id INT AUTO_INCREMENT NOT NULL, id_sous_categorie_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_52743D7BF252D75F (id_sous_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, id_utilisateur_id INT NOT NULL, INDEX IDX_1D1C63B3C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, id_ville_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3F7E4ECA3 (id_ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billet_evenement ADD CONSTRAINT FK_F4D57803C09B4CA FOREIGN KEY (id_billet_evenement_id) REFERENCES billet (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6349F34925F FOREIGN KEY (id_categorie_id) REFERENCES sous_categorie (id)');
        $this->addSql('ALTER TABLE demande_evenement ADD CONSTRAINT FK_7E0A92CB2C115A61 FOREIGN KEY (id_evenement_id) REFERENCES billet_evenement (id)');
        $this->addSql('ALTER TABLE demande_evenement ADD CONSTRAINT FK_7E0A92CB94638275 FOREIGN KEY (id_enement_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE demande_evenement ADD CONSTRAINT FK_7E0A92CB54E94CCD FOREIGN KEY (id_demande_evenement_id) REFERENCES avis (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1761813BD72 FOREIGN KEY (id_region_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495585542AE1 FOREIGN KEY (id_reservation_id) REFERENCES billet (id)');
        $this->addSql('ALTER TABLE sous_categorie ADD CONSTRAINT FK_52743D7BF252D75F FOREIGN KEY (id_sous_categorie_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3F7E4ECA3 FOREIGN KEY (id_ville_id) REFERENCES destination (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_evenement DROP FOREIGN KEY FK_7E0A92CB54E94CCD');
        $this->addSql('ALTER TABLE billet_evenement DROP FOREIGN KEY FK_F4D57803C09B4CA');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495585542AE1');
        $this->addSql('ALTER TABLE demande_evenement DROP FOREIGN KEY FK_7E0A92CB2C115A61');
        $this->addSql('ALTER TABLE sous_categorie DROP FOREIGN KEY FK_52743D7BF252D75F');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3F7E4ECA3');
        $this->addSql('ALTER TABLE demande_evenement DROP FOREIGN KEY FK_7E0A92CB94638275');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6349F34925F');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1761813BD72');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE billet');
        $this->addSql('DROP TABLE billet_evenement');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cout_destination');
        $this->addSql('DROP TABLE demande_evenement');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE sous_categorie');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE ville');
    }
}
