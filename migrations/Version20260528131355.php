<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260528131355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representations (id INT AUTO_INCREMENT NOT NULL, the_show_id INT NOT NULL, location_id INT NOT NULL, schedule DATETIME NOT NULL, INDEX IDX_C90A4013013D282 (the_show_id), INDEX IDX_C90A40164D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A4013013D282 FOREIGN KEY (the_show_id) REFERENCES `shows` (id)');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A40164D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A4013013D282');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A40164D218E');
        $this->addSql('DROP TABLE representations');
    }
}
