<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200806170315 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE social ADD profil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE social ADD CONSTRAINT FK_7161E187275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_7161E187275ED078 ON social (profil_id)');
        $this->addSql('ALTER TABLE user ADD profil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649275ED078 ON user (profil_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE social DROP FOREIGN KEY FK_7161E187275ED078');
        $this->addSql('DROP INDEX IDX_7161E187275ED078 ON social');
        $this->addSql('ALTER TABLE social DROP profil_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('DROP INDEX UNIQ_8D93D649275ED078 ON user');
        $this->addSql('ALTER TABLE user DROP profil_id');
    }
}
