<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410133912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tax_type DROP FOREIGN KEY FK_905158D1C54C8C93');
        $this->addSql('DROP INDEX IDX_905158D1C54C8C93 ON tax_type');
        $this->addSql('ALTER TABLE tax_type DROP type_id');
        $this->addSql('ALTER TABLE tax ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA76C54C8C93 FOREIGN KEY (type_id) REFERENCES tax_type (id)');
        $this->addSql('CREATE INDEX IDX_8E81BA76C54C8C93 ON tax (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA76C54C8C93');
        $this->addSql('DROP INDEX IDX_8E81BA76C54C8C93 ON tax');
        $this->addSql('ALTER TABLE tax DROP type_id');
        $this->addSql('ALTER TABLE tax_type ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE tax_type ADD CONSTRAINT FK_905158D1C54C8C93 FOREIGN KEY (type_id) REFERENCES tax_type (id)');
        $this->addSql('CREATE INDEX IDX_905158D1C54C8C93 ON tax_type (type_id)');
    }
}
