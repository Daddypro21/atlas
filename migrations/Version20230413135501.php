<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413135501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE benevole DROP FOREIGN KEY FK_B4014FDBBF396750');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9BF396750');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE benevole ADD CONSTRAINT FK_B4014FDBBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
