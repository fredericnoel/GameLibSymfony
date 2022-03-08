<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307150849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editors (id INT AUTO_INCREMENT NOT NULL, name_editor VARCHAR(255) NOT NULL, country_editor VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editors_has_studios (id_editor_id INT NOT NULL, id_studio_id INT NOT NULL, INDEX IDX_1B3FE2D1E9A0106B (id_editor_id), INDEX IDX_1B3FE2D1C45A9478 (id_studio_id), PRIMARY KEY(id_editor_id, id_studio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, title_game VARCHAR(255) NOT NULL, release_date_game DATE NOT NULL, description_game LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games_has_platforms (id INT AUTO_INCREMENT NOT NULL, id_game_id INT NOT NULL, id_platform_id INT NOT NULL, INDEX IDX_8E8E9FB43A127075 (id_game_id), INDEX IDX_8E8E9FB4E7F48498 (id_platform_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platforms (id INT AUTO_INCREMENT NOT NULL, manufacturer_platform VARCHAR(255) NOT NULL, model_platform VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studios (id INT AUTO_INCREMENT NOT NULL, name_studio VARCHAR(255) NOT NULL, country_studio VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studios_has_games (id_studio_id INT NOT NULL, id_game_id INT NOT NULL, INDEX IDX_4BE01A18C45A9478 (id_studio_id), INDEX IDX_4BE01A183A127075 (id_game_id), PRIMARY KEY(id_studio_id, id_game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, id_role_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name_user VARCHAR(255) NOT NULL, first_name_user VARCHAR(255) NOT NULL, email_user VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, password_user VARCHAR(255) NOT NULL, accoun_creation_date_user DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', account_validation_user DATETIME DEFAULT NULL, bio_user LONGTEXT DEFAULT NULL, avatar_user VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E989E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_has_games_has_platforms (id_user_id INT NOT NULL, id_game_id INT NOT NULL, id_platform_id INT NOT NULL, rate SMALLINT DEFAULT NULL, INDEX IDX_9EB5359F79F37AE5 (id_user_id), INDEX IDX_9EB5359F3A127075 (id_game_id), INDEX IDX_9EB5359FE7F48498 (id_platform_id), PRIMARY KEY(id_user_id, id_game_id, id_platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE editors_has_studios ADD CONSTRAINT FK_1B3FE2D1E9A0106B FOREIGN KEY (id_editor_id) REFERENCES editors (id)');
        $this->addSql('ALTER TABLE editors_has_studios ADD CONSTRAINT FK_1B3FE2D1C45A9478 FOREIGN KEY (id_studio_id) REFERENCES studios (id)');
        $this->addSql('ALTER TABLE games_has_platforms ADD CONSTRAINT FK_8E8E9FB43A127075 FOREIGN KEY (id_game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE games_has_platforms ADD CONSTRAINT FK_8E8E9FB4E7F48498 FOREIGN KEY (id_platform_id) REFERENCES platforms (id)');
        $this->addSql('ALTER TABLE studios_has_games ADD CONSTRAINT FK_4BE01A18C45A9478 FOREIGN KEY (id_studio_id) REFERENCES studios (id)');
        $this->addSql('ALTER TABLE studios_has_games ADD CONSTRAINT FK_4BE01A183A127075 FOREIGN KEY (id_game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E989E8BDC FOREIGN KEY (id_role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE users_has_games_has_platforms ADD CONSTRAINT FK_9EB5359F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_has_games_has_platforms ADD CONSTRAINT FK_9EB5359F3A127075 FOREIGN KEY (id_game_id) REFERENCES games_has_platforms (id)');
        $this->addSql('ALTER TABLE users_has_games_has_platforms ADD CONSTRAINT FK_9EB5359FE7F48498 FOREIGN KEY (id_platform_id) REFERENCES games_has_platforms (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE editors_has_studios DROP FOREIGN KEY FK_1B3FE2D1E9A0106B');
        $this->addSql('ALTER TABLE games_has_platforms DROP FOREIGN KEY FK_8E8E9FB43A127075');
        $this->addSql('ALTER TABLE studios_has_games DROP FOREIGN KEY FK_4BE01A183A127075');
        $this->addSql('ALTER TABLE users_has_games_has_platforms DROP FOREIGN KEY FK_9EB5359F3A127075');
        $this->addSql('ALTER TABLE users_has_games_has_platforms DROP FOREIGN KEY FK_9EB5359FE7F48498');
        $this->addSql('ALTER TABLE games_has_platforms DROP FOREIGN KEY FK_8E8E9FB4E7F48498');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E989E8BDC');
        $this->addSql('ALTER TABLE editors_has_studios DROP FOREIGN KEY FK_1B3FE2D1C45A9478');
        $this->addSql('ALTER TABLE studios_has_games DROP FOREIGN KEY FK_4BE01A18C45A9478');
        $this->addSql('ALTER TABLE users_has_games_has_platforms DROP FOREIGN KEY FK_9EB5359F79F37AE5');
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
