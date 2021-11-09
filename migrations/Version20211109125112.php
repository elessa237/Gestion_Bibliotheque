<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109125112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D8698A76A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, user_id, doc_name, doc_size, updated_at, created_at, name FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, doc_name VARCHAR(255) NOT NULL COLLATE BINARY, doc_size INTEGER NOT NULL, updated_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES Utilisateurs (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO document (id, user_id, doc_name, doc_size, updated_at, created_at, name) SELECT id, user_id, doc_name, doc_size, updated_at, created_at, name FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
        $this->addSql('CREATE INDEX IDX_D8698A76A76ED395 ON document (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D8698A76A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__document AS SELECT id, user_id, name, doc_name, doc_size, updated_at, created_at FROM document');
        $this->addSql('DROP TABLE document');
        $this->addSql('CREATE TABLE document (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, doc_name VARCHAR(255) NOT NULL, doc_size INTEGER NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO document (id, user_id, name, doc_name, doc_size, updated_at, created_at) SELECT id, user_id, name, doc_name, doc_size, updated_at, created_at FROM __temp__document');
        $this->addSql('DROP TABLE __temp__document');
        $this->addSql('CREATE INDEX IDX_D8698A76A76ED395 ON document (user_id)');
    }
}
