<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413091746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gift (id INT AUTO_INCREMENT NOT NULL, hotel_id INT NOT NULL, benevole_id INT DEFAULT NULL, kindofdonation LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', description LONGTEXT NOT NULL, recovery_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', availablity TINYINT(1) NOT NULL, INDEX IDX_A47C990D3243BB18 (hotel_id), INDEX IDX_A47C990DE77B7C09 (benevole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990D3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990DE77B7C09 FOREIGN KEY (benevole_id) REFERENCES benevole (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990D3243BB18');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990DE77B7C09');
        $this->addSql('DROP TABLE gift');
    }
}
