<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180217075404 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE perimission_role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nomination (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nominee_id INT DEFAULT NULL, INDEX IDX_87266218A76ED395 (user_id), INDEX IDX_87266218C6A2398 (nominee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perimission_user (permission_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_type VARCHAR(255) NOT NULL, PRIMARY KEY(permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, display_name VARCHAR(60) DEFAULT NULL, description VARCHAR(60) DEFAULT NULL, UNIQUE INDEX UNIQ_B63E2EC75E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (role_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_type VARCHAR(255) NOT NULL, PRIMARY KEY(role_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, display_name VARCHAR(60) DEFAULT NULL, description VARCHAR(60) DEFAULT NULL, UNIQUE INDEX UNIQ_E04992AA5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_87266218A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE nomination ADD CONSTRAINT FK_87266218C6A2398 FOREIGN KEY (nominee_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE perimission_user ADD CONSTRAINT FK_1F071853FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user ADD apikey VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B84757A1 ON user (apikey)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDD60322AC');
        $this->addSql('ALTER TABLE perimission_user DROP FOREIGN KEY FK_1F071853FED90CCA');
        $this->addSql('DROP TABLE perimission_role');
        $this->addSql('DROP TABLE nomination');
        $this->addSql('DROP TABLE perimission_user');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP INDEX UNIQ_8D93D649B84757A1 ON user');
        $this->addSql('ALTER TABLE user DROP apikey');
    }
}
