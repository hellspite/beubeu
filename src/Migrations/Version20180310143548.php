<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180310143548 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exhibit CHANGE gallery1 gallery1 VARCHAR(250) DEFAULT NULL, CHANGE gallery2 gallery2 VARCHAR(250) DEFAULT NULL, CHANGE gallery3 gallery3 VARCHAR(250) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exhibit CHANGE gallery1 gallery1 VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci, CHANGE gallery2 gallery2 VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci, CHANGE gallery3 gallery3 VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci');
    }
}
