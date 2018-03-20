<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180318222339 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE votes ADD nomination_id INT DEFAULT NULL, ADD vote INT NOT NULL');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFF1B2BBA7 FOREIGN KEY (nomination_id) REFERENCES nomination (id)');
        $this->addSql('CREATE INDEX IDX_518B7ACFF1B2BBA7 ON votes (nomination_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACFF1B2BBA7');
        $this->addSql('DROP INDEX IDX_518B7ACFF1B2BBA7 ON votes');
        $this->addSql('ALTER TABLE votes DROP nomination_id, DROP vote');
    }
}
