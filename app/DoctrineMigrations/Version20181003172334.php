<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181003172334 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE base_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, type VARCHAR(255) NOT NULL, model VARCHAR(255) DEFAULT NULL, os VARCHAR(255) DEFAULT NULL, diagonal NUMERIC(3, 2) DEFAULT NULL, weight NUMERIC(5, 2) DEFAULT NULL, voltage INT DEFAULT NULL, material VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, feature VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders DROP INDEX FK_E52FFDEEA76ED395, ADD UNIQUE INDEX UNIQ_E52FFDEEA76ED395 (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE base_product');
        $this->addSql('ALTER TABLE orders DROP INDEX UNIQ_E52FFDEEA76ED395, ADD INDEX FK_E52FFDEEA76ED395 (user_id)');
    }
}
