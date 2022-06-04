<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604204627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bay_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE custom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE material_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_of_work_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE worker_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bay (id INT NOT NULL, bay_type VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, customer_phone VARCHAR(11) NOT NULL, customer_first_name VARCHAR(20) NOT NULL, customer_middle_name VARCHAR(20) NOT NULL, customer_last_name VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE custom (id INT NOT NULL, client_id INT NOT NULL, car_information VARCHAR(150) NOT NULL, order_date DATE NOT NULL, order_end_date DATE DEFAULT NULL, order_pay_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F584169B19EB6921 ON custom (client_id)');
        $this->addSql('CREATE TABLE material (id INT NOT NULL, material_name VARCHAR(25) NOT NULL, material_price NUMERIC(10, 2) NOT NULL, material_description VARCHAR(100) DEFAULT NULL, material_amount INT NOT NULL, material_measure VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, service_description VARCHAR(50) NOT NULL, service_price NUMERIC(10, 2) NOT NULL, service_complete_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_of_work (id INT NOT NULL, type_of_work_name VARCHAR(20) NOT NULL, type_of_work_skills VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE worker (id INT NOT NULL, worker_first_name VARCHAR(20) NOT NULL, worker_middle_name VARCHAR(20) NOT NULL, worker_last_name VARCHAR(20) DEFAULT NULL, worker_phone VARCHAR(11) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE custom ADD CONSTRAINT FK_F584169B19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE custom DROP CONSTRAINT FK_F584169B19EB6921');
        $this->addSql('DROP SEQUENCE bay_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE client_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE custom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE material_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_of_work_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE worker_id_seq CASCADE');
        $this->addSql('DROP TABLE bay');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE custom');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE type_of_work');
        $this->addSql('DROP TABLE worker');
    }
}
