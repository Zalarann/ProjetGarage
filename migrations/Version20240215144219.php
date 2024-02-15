<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215144219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autorepairservice (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(64) DEFAULT NULL, firstname VARCHAR(32) NOT NULL, email VARCHAR(64) NOT NULL, phonenumber VARCHAR(32) NOT NULL, message LONGTEXT NOT NULL, subject VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customertestimonial (id INT AUTO_INCREMENT NOT NULL, isvalidated TINYINT(1) NOT NULL, name VARCHAR(64) NOT NULL, note INT NOT NULL, comment LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, createat DATETIME NOT NULL, updatedat DATETIME DEFAULT NULL, amopeningtime LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', pmopeningtime LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(128) NOT NULL, slug VARCHAR(128) NOT NULL, createat DATETIME NOT NULL, updateat DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usedauto (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(10, 2) NOT NULL, mileage NUMERIC(10, 0) NOT NULL, yearofregistration DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(32) NOT NULL, firstname VARCHAR(32) NOT NULL, email VARCHAR(64) NOT NULL, password VARCHAR(255) NOT NULL, role JSON NOT NULL, createat DATETIME NOT NULL, updatedat DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE autorepairservice');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE customertestimonial');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE usedauto');
        $this->addSql('DROP TABLE user');
    }
}
