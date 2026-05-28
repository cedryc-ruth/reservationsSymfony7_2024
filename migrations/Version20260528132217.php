<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260528132217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations ADD room_id INT NOT NULL');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A40154177093 FOREIGN KEY (room_id) REFERENCES rooms (id)');
        $this->addSql('CREATE INDEX IDX_C90A40154177093 ON representations (room_id)');
        $this->addSql('ALTER TABLE rooms ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A9664D218E FOREIGN KEY (location_id) REFERENCES locations (id)');
        $this->addSql('CREATE INDEX IDX_7CA11A9664D218E ON rooms (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A40154177093');
        $this->addSql('DROP INDEX IDX_C90A40154177093 ON representations');
        $this->addSql('ALTER TABLE representations DROP room_id');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A9664D218E');
        $this->addSql('DROP INDEX IDX_7CA11A9664D218E ON rooms');
        $this->addSql('ALTER TABLE rooms DROP location_id');
    }
}
