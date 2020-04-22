<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410095108 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tax_type (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_905158D1C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialisation (id INT AUTO_INCREMENT NOT NULL, faculty_id INT NOT NULL, name VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, tax_amount DOUBLE PRECISION NOT NULL, credit_amount DOUBLE PRECISION DEFAULT NULL, discount INT DEFAULT NULL, INDEX IDX_B9D6A3A2680CAB68 (faculty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, cnp VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, father_initial VARCHAR(1) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, total_credits INT NOT NULL, student_status VARCHAR(255) NOT NULL, INDEX IDX_8D93D649C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_specialisation (user_id INT NOT NULL, specialisation_id INT NOT NULL, INDEX IDX_D2537CFBA76ED395 (user_id), INDEX IDX_D2537CFB5627D44C (specialisation_id), PRIMARY KEY(user_id, specialisation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE study_program (id INT AUTO_INCREMENT NOT NULL, specialisation_id INT NOT NULL, faculty_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, semester_number SMALLINT NOT NULL, credit_number INT NOT NULL, INDEX IDX_A7F88AE65627D44C (specialisation_id), INDEX IDX_A7F88AE6680CAB68 (faculty_id), INDEX IDX_A7F88AE6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tax (id INT AUTO_INCREMENT NOT NULL, specialisation_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, amount INT NOT NULL, penalty INT NOT NULL, discount INT NOT NULL, INDEX IDX_8E81BA765627D44C (specialisation_id), INDEX IDX_8E81BA76A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_tax (id INT AUTO_INCREMENT NOT NULL, tax_id INT NOT NULL, user_id INT NOT NULL, created_at DATETIME NOT NULL, payment_date DATETIME NOT NULL, INDEX IDX_6597DBFDB2A824D8 (tax_id), INDEX IDX_6597DBFDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tax_type ADD CONSTRAINT FK_905158D1C54C8C93 FOREIGN KEY (type_id) REFERENCES tax_type (id)');
        $this->addSql('ALTER TABLE specialisation ADD CONSTRAINT FK_B9D6A3A2680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C54C8C93 FOREIGN KEY (type_id) REFERENCES user_type (id)');
        $this->addSql('ALTER TABLE user_specialisation ADD CONSTRAINT FK_D2537CFBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specialisation ADD CONSTRAINT FK_D2537CFB5627D44C FOREIGN KEY (specialisation_id) REFERENCES specialisation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE study_program ADD CONSTRAINT FK_A7F88AE65627D44C FOREIGN KEY (specialisation_id) REFERENCES specialisation (id)');
        $this->addSql('ALTER TABLE study_program ADD CONSTRAINT FK_A7F88AE6680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id)');
        $this->addSql('ALTER TABLE study_program ADD CONSTRAINT FK_A7F88AE6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA765627D44C FOREIGN KEY (specialisation_id) REFERENCES specialisation (id)');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_tax ADD CONSTRAINT FK_6597DBFDB2A824D8 FOREIGN KEY (tax_id) REFERENCES tax (id)');
        $this->addSql('ALTER TABLE user_tax ADD CONSTRAINT FK_6597DBFDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tax_type DROP FOREIGN KEY FK_905158D1C54C8C93');
        $this->addSql('ALTER TABLE user_specialisation DROP FOREIGN KEY FK_D2537CFB5627D44C');
        $this->addSql('ALTER TABLE study_program DROP FOREIGN KEY FK_A7F88AE65627D44C');
        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA765627D44C');
        $this->addSql('ALTER TABLE user_specialisation DROP FOREIGN KEY FK_D2537CFBA76ED395');
        $this->addSql('ALTER TABLE study_program DROP FOREIGN KEY FK_A7F88AE6A76ED395');
        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA76A76ED395');
        $this->addSql('ALTER TABLE user_tax DROP FOREIGN KEY FK_6597DBFDA76ED395');
        $this->addSql('ALTER TABLE specialisation DROP FOREIGN KEY FK_B9D6A3A2680CAB68');
        $this->addSql('ALTER TABLE study_program DROP FOREIGN KEY FK_A7F88AE6680CAB68');
        $this->addSql('ALTER TABLE user_tax DROP FOREIGN KEY FK_6597DBFDB2A824D8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C54C8C93');
        $this->addSql('DROP TABLE tax_type');
        $this->addSql('DROP TABLE specialisation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_specialisation');
        $this->addSql('DROP TABLE study_program');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE tax');
        $this->addSql('DROP TABLE user_type');
        $this->addSql('DROP TABLE user_tax');
    }
}
