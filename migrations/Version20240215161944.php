<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215161944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customertestimonial ADD autorepaireservice_id INT NOT NULL, ADD autorepairservice_id INT DEFAULT NULL, ADD usedauto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customertestimonial ADD CONSTRAINT FK_783F390D53F1EB16 FOREIGN KEY (autorepaireservice_id) REFERENCES autorepairservice (id)');
        $this->addSql('ALTER TABLE customertestimonial ADD CONSTRAINT FK_783F390D7943FA78 FOREIGN KEY (autorepairservice_id) REFERENCES autorepairservice (id)');
        $this->addSql('ALTER TABLE customertestimonial ADD CONSTRAINT FK_783F390D3BE07D37 FOREIGN KEY (usedauto_id) REFERENCES usedauto (id)');
        $this->addSql('CREATE INDEX IDX_783F390D53F1EB16 ON customertestimonial (autorepaireservice_id)');
        $this->addSql('CREATE INDEX IDX_783F390D7943FA78 ON customertestimonial (autorepairservice_id)');
        $this->addSql('CREATE INDEX IDX_783F390D3BE07D37 ON customertestimonial (usedauto_id)');
        $this->addSql('ALTER TABLE garage ADD owner_id INT NOT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F26610B7E3C61F9 ON garage (owner_id)');
        $this->addSql('ALTER TABLE picture ADD usedauto_id INT NOT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F893BE07D37 FOREIGN KEY (usedauto_id) REFERENCES usedauto (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F893BE07D37 ON picture (usedauto_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customertestimonial DROP FOREIGN KEY FK_783F390D53F1EB16');
        $this->addSql('ALTER TABLE customertestimonial DROP FOREIGN KEY FK_783F390D7943FA78');
        $this->addSql('ALTER TABLE customertestimonial DROP FOREIGN KEY FK_783F390D3BE07D37');
        $this->addSql('DROP INDEX IDX_783F390D53F1EB16 ON customertestimonial');
        $this->addSql('DROP INDEX IDX_783F390D7943FA78 ON customertestimonial');
        $this->addSql('DROP INDEX IDX_783F390D3BE07D37 ON customertestimonial');
        $this->addSql('ALTER TABLE customertestimonial DROP autorepaireservice_id, DROP autorepairservice_id, DROP usedauto_id');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B7E3C61F9');
        $this->addSql('DROP INDEX UNIQ_9F26610B7E3C61F9 ON garage');
        $this->addSql('ALTER TABLE garage DROP owner_id');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F893BE07D37');
        $this->addSql('DROP INDEX IDX_16DB4F893BE07D37 ON picture');
        $this->addSql('ALTER TABLE picture DROP usedauto_id');
    }
}
