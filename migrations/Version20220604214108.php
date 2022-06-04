<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604214108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE material ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE material ADD CONSTRAINT FK_7CBE7595ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_7CBE7595ED5CA9E6 ON material (service_id)');
        $this->addSql('ALTER TABLE service ADD bay_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD type_of_work_id INT NOT NULL');
        $this->addSql('ALTER TABLE service ADD worker_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2DF9BA23B FOREIGN KEY (bay_id) REFERENCES bay (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD25B42744F FOREIGN KEY (type_of_work_id) REFERENCES type_of_work (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD26B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E19D9AD2DF9BA23B ON service (bay_id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD25B42744F ON service (type_of_work_id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD26B20BA36 ON service (worker_id)');
        $this->addSql('ALTER TABLE worker ADD bay_id INT NOT NULL');
        $this->addSql('ALTER TABLE worker ADD type_of_work_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF62DF9BA23B FOREIGN KEY (bay_id) REFERENCES bay (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF625B42744F FOREIGN KEY (type_of_work_id) REFERENCES type_of_work (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9FB2BF62DF9BA23B ON worker (bay_id)');
        $this->addSql('CREATE INDEX IDX_9FB2BF625B42744F ON worker (type_of_work_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE material DROP CONSTRAINT FK_7CBE7595ED5CA9E6');
        $this->addSql('DROP INDEX IDX_7CBE7595ED5CA9E6');
        $this->addSql('ALTER TABLE material DROP service_id');
        $this->addSql('ALTER TABLE worker DROP CONSTRAINT FK_9FB2BF62DF9BA23B');
        $this->addSql('ALTER TABLE worker DROP CONSTRAINT FK_9FB2BF625B42744F');
        $this->addSql('DROP INDEX IDX_9FB2BF62DF9BA23B');
        $this->addSql('DROP INDEX IDX_9FB2BF625B42744F');
        $this->addSql('ALTER TABLE worker DROP bay_id');
        $this->addSql('ALTER TABLE worker DROP type_of_work_id');
        $this->addSql('ALTER TABLE service DROP CONSTRAINT FK_E19D9AD2DF9BA23B');
        $this->addSql('ALTER TABLE service DROP CONSTRAINT FK_E19D9AD25B42744F');
        $this->addSql('ALTER TABLE service DROP CONSTRAINT FK_E19D9AD26B20BA36');
        $this->addSql('DROP INDEX IDX_E19D9AD2DF9BA23B');
        $this->addSql('DROP INDEX IDX_E19D9AD25B42744F');
        $this->addSql('DROP INDEX IDX_E19D9AD26B20BA36');
        $this->addSql('ALTER TABLE service DROP bay_id');
        $this->addSql('ALTER TABLE service DROP type_of_work_id');
        $this->addSql('ALTER TABLE service DROP worker_id');
    }
}
