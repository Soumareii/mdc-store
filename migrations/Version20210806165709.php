<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806165709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A4D5C043B');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4D5C043B FOREIGN KEY (blogposts_id) REFERENCES blogposts (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA21214B7');
        $this->addSql('ALTER TABLE products CHANGE categories_id categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A4D5C043B');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4D5C043B FOREIGN KEY (blogposts_id) REFERENCES blogposts (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AA21214B7');
        $this->addSql('ALTER TABLE products CHANGE categories_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
