<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180128105029 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE performance (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(250) NOT NULL, image VARCHAR(250) NOT NULL, description LONGTEXT NOT NULL, `when` DATETIME NOT NULL, slug VARCHAR(300) NOT NULL, created DATETIME NOT NULL, UNIQUE INDEX UNIQ_82D79681989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE `show`');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `show` (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci, image VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, `when` DATETIME NOT NULL, slug VARCHAR(300) NOT NULL COLLATE utf8_unicode_ci, created DATETIME NOT NULL, UNIQUE INDEX UNIQ_320ED901989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE performance');
    }
}
