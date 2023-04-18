<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230414111038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benevole (id INT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, numberphone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gift (id INT AUTO_INCREMENT NOT NULL, hotel_id INT NOT NULL, benevole_id INT DEFAULT NULL, kindofdonation VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, recovery_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', availablity TINYINT(1) NOT NULL, INDEX IDX_A47C990D3243BB18 (hotel_id), INDEX IDX_A47C990DE77B7C09 (benevole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, contactphone VARCHAR(255) NOT NULL, managername VARCHAR(255) NOT NULL, managerfirstname VARCHAR(255) NOT NULL, managerphone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE benevole ADD CONSTRAINT FK_B4014FDBBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990D3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990DE77B7C09 FOREIGN KEY (benevole_id) REFERENCES benevole (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4BF396750');
        $this->addSql('ALTER TABLE benevole DROP FOREIGN KEY FK_B4014FDBBF396750');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990D3243BB18');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990DE77B7C09');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9BF396750');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE benevole');
        $this->addSql('DROP TABLE gift');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
