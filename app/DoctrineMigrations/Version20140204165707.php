<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140204165707 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE bddarticle");
        $this->addSql("DROP TABLE bddimage");
        $this->addSql("DROP TABLE bddvoyage");
        $this->addSql("ALTER TABLE user ADD birthdate DATE DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD visitedcountries LONGTEXT DEFAULT NULL, ADD github_id VARCHAR(255) DEFAULT NULL, ADD facebook_id VARCHAR(255) DEFAULT NULL, ADD google_id VARCHAR(255) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE bddarticle (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, publication TINYINT(1) NOT NULL, iduser INT NOT NULL, idvoyage INT NOT NULL, likecount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE bddimage (id INT AUTO_INCREMENT NOT NULL, lien LONGTEXT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE bddvoyage (id INT AUTO_INCREMENT NOT NULL, Lieu VARCHAR(255) NOT NULL, Duree INT NOT NULL, Id_user INT NOT NULL, Budget INT NOT NULL, Titre VARCHAR(255) NOT NULL, Description VARCHAR(500) NOT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, Likecount INT NOT NULL, nbrarticle INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE user DROP birthdate, DROP status, DROP visitedcountries, DROP github_id, DROP facebook_id, DROP google_id");
    }
}
