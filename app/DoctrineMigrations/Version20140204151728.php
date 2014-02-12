<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140204151728 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE user_oauth (id BIGINT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, provider VARCHAR(250) NOT NULL, provider_id VARCHAR(250) NOT NULL, nickname VARCHAR(250) DEFAULT NULL, realname VARCHAR(250) DEFAULT NULL, email VARCHAR(250) DEFAULT NULL, profile_picture VARCHAR(250) DEFAULT NULL, access_token VARCHAR(250) DEFAULT NULL, refresh_token VARCHAR(250) DEFAULT NULL, token_secret VARCHAR(250) DEFAULT NULL, expires_in VARCHAR(250) DEFAULT NULL, INDEX IDX_E618839CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE user_oauth ADD CONSTRAINT FK_E618839CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)");
        $this->addSql("ALTER TABLE user DROP github_id, DROP facebook_id, DROP google_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("DROP TABLE user_oauth");
        $this->addSql("ALTER TABLE user ADD github_id VARCHAR(255) DEFAULT NULL, ADD facebook_id VARCHAR(255) DEFAULT NULL, ADD google_id VARCHAR(255) DEFAULT NULL");
    }
}
