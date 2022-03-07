<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307140755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editors (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name_editor VARCHAR(255) NOT NULL, country_editor VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE editors_has_studios (id_editor_id INTEGER NOT NULL, id_studio_id INTEGER NOT NULL, PRIMARY KEY(id_editor_id, id_studio_id))');
        $this->addSql('CREATE INDEX IDX_1B3FE2D1E9A0106B ON editors_has_studios (id_editor_id)');
        $this->addSql('CREATE INDEX IDX_1B3FE2D1C45A9478 ON editors_has_studios (id_studio_id)');
        $this->addSql('CREATE TABLE games (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title_game VARCHAR(255) NOT NULL, release_date_game DATE NOT NULL, description_game CLOB NOT NULL)');
        $this->addSql('CREATE TABLE games_has_platforms (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_game_id INTEGER NOT NULL, id_platform_id INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_8E8E9FB43A127075 ON games_has_platforms (id_game_id)');
        $this->addSql('CREATE INDEX IDX_8E8E9FB4E7F48498 ON games_has_platforms (id_platform_id)');
        $this->addSql('CREATE TABLE platforms (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, manufacturer_platform VARCHAR(255) NOT NULL, model_platform VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE roles (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, role_name VARCHAR(45) NOT NULL)');
        $this->addSql('CREATE TABLE studios (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name_studio VARCHAR(255) NOT NULL, country_studio VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE studios_has_games (id_studio_id INTEGER NOT NULL, id_game_id INTEGER NOT NULL, PRIMARY KEY(id_studio_id, id_game_id))');
        $this->addSql('CREATE INDEX IDX_4BE01A18C45A9478 ON studios_has_games (id_studio_id)');
        $this->addSql('CREATE INDEX IDX_4BE01A183A127075 ON studios_has_games (id_game_id)');
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_role_id INTEGER NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, name_user VARCHAR(255) NOT NULL, first_name_user VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, password_user VARCHAR(255) NOT NULL, accoun_creation_date_user DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , account_validation_user DATETIME DEFAULT NULL, bio_user CLOB DEFAULT NULL, avatar_user VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE INDEX IDX_1483A5E989E8BDC ON users (id_role_id)');
        $this->addSql('CREATE TABLE users_has_games_has_platforms (id_user_id INTEGER NOT NULL, id_game_id INTEGER NOT NULL, id_platform_id INTEGER NOT NULL, rate SMALLINT DEFAULT NULL, PRIMARY KEY(id_user_id, id_game_id, id_platform_id))');
        $this->addSql('CREATE INDEX IDX_9EB5359F79F37AE5 ON users_has_games_has_platforms (id_user_id)');
        $this->addSql('CREATE INDEX IDX_9EB5359F3A127075 ON users_has_games_has_platforms (id_game_id)');
        $this->addSql('CREATE INDEX IDX_9EB5359FE7F48498 ON users_has_games_has_platforms (id_platform_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE editors');
        $this->addSql('DROP TABLE editors_has_studios');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE games_has_platforms');
        $this->addSql('DROP TABLE platforms');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE studios');
        $this->addSql('DROP TABLE studios_has_games');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_has_games_has_platforms');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
