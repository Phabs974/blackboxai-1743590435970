<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240116000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des tables initiales';
    }

    public function up(Schema $schema): void
    {
        // Table des sites
        $this->addSql('CREATE TABLE site (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            postal_code VARCHAR(10) NOT NULL,
            city VARCHAR(255) NOT NULL,
            phone VARCHAR(20) DEFAULT NULL,
            email VARCHAR(255) DEFAULT NULL,
            is_active BOOLEAN NOT NULL DEFAULT true,
            business_hours JSON NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        )');

        // Table des statuts
        $this->addSql('CREATE TABLE status (
            id SERIAL PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            color VARCHAR(7) NOT NULL,
            position INT NOT NULL,
            is_default BOOLEAN NOT NULL DEFAULT false,
            is_final BOOLEAN NOT NULL DEFAULT false,
            allowed_transitions JSON NOT NULL,
            description TEXT DEFAULT NULL,
            notify_customer BOOLEAN NOT NULL DEFAULT true,
            automated_actions JSON NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            CONSTRAINT status_name_unique UNIQUE (name)
        )');

        // Table des utilisateurs
        $this->addSql('CREATE TABLE "user" (
            id SERIAL PRIMARY KEY,
            email VARCHAR(180) NOT NULL,
            roles JSON NOT NULL,
            password VARCHAR(255) NOT NULL,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            phone VARCHAR(20) DEFAULT NULL,
            is_active BOOLEAN NOT NULL DEFAULT true,
            preferences JSON NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            last_login_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            CONSTRAINT user_email_unique UNIQUE (email)
        )');

        // Table de liaison users_sites
        $this->addSql('CREATE TABLE users_sites (
            user_id INT NOT NULL,
            site_id INT NOT NULL,
            PRIMARY KEY (user_id, site_id),
            CONSTRAINT fk_users_sites_user FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE,
            CONSTRAINT fk_users_sites_site FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE
        )');

        // Table des réparations
        $this->addSql('CREATE TABLE repair (
            id SERIAL PRIMARY KEY,
            customer_name VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            email VARCHAR(255) DEFAULT NULL,
            product VARCHAR(255) NOT NULL,
            color VARCHAR(50) DEFAULT NULL,
            device_condition TEXT NOT NULL,
            serial_number VARCHAR(100) DEFAULT NULL,
            has_cable BOOLEAN NOT NULL DEFAULT false,
            has_controller BOOLEAN NOT NULL DEFAULT false,
            accessories JSON NOT NULL,
            priority BOOLEAN NOT NULL DEFAULT false,
            deposit_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            tracking_token VARCHAR(255) DEFAULT NULL,
            qr_code VARCHAR(255) DEFAULT NULL,
            bar_code VARCHAR(255) DEFAULT NULL,
            estimated_completion_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            technical_notes TEXT DEFAULT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            status_id INT NOT NULL,
            site_id INT NOT NULL,
            CONSTRAINT fk_repair_status FOREIGN KEY (status_id) REFERENCES status (id),
            CONSTRAINT fk_repair_site FOREIGN KEY (site_id) REFERENCES site (id),
            CONSTRAINT repair_tracking_token_unique UNIQUE (tracking_token)
        )');

        // Table de l'historique des réparations
        $this->addSql('CREATE TABLE repair_history (
            id SERIAL PRIMARY KEY,
            repair_id INT NOT NULL,
            user_id INT NOT NULL,
            action VARCHAR(50) NOT NULL,
            changes JSON NOT NULL,
            comment TEXT DEFAULT NULL,
            metadata JSON DEFAULT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            CONSTRAINT fk_repair_history_repair FOREIGN KEY (repair_id) REFERENCES repair (id) ON DELETE CASCADE,
            CONSTRAINT fk_repair_history_user FOREIGN KEY (user_id) REFERENCES "user" (id)
        )');

        // Index
        $this->addSql('CREATE INDEX idx_repair_tracking_token ON repair (tracking_token)');
        $this->addSql('CREATE INDEX idx_repair_status ON repair (status_id)');
        $this->addSql('CREATE INDEX idx_repair_site ON repair (site_id)');
        $this->addSql('CREATE INDEX idx_repair_created_at ON repair (created_at)');
        $this->addSql('CREATE INDEX idx_repair_history_repair ON repair_history (repair_id)');
        $this->addSql('CREATE INDEX idx_repair_history_user ON repair_history (user_id)');
        $this->addSql('CREATE INDEX idx_repair_history_created_at ON repair_history (created_at)');
        $this->addSql('CREATE INDEX idx_user_email ON "user" (email)');
        $this->addSql('CREATE INDEX idx_status_position ON status (position)');

        // Insertion des statuts par défaut
        $this->addSql("INSERT INTO status (name, color, position, is_default, allowed_transitions, automated_actions, created_at) VALUES
            ('En attente', '#FFA500', 1, true, '[]', '{\"send_email\": true, \"send_sms\": false}', CURRENT_TIMESTAMP),
            ('Diagnostic', '#3498DB', 2, false, '[1]', '{\"send_email\": true, \"send_sms\": false}', CURRENT_TIMESTAMP),
            ('En cours', '#F1C40F', 3, false, '[1,2]', '{\"send_email\": true, \"send_sms\": false}', CURRENT_TIMESTAMP),
            ('Terminé', '#2ECC71', 4, false, '[1,2,3]', '{\"send_email\": true, \"send_sms\": true}', CURRENT_TIMESTAMP),
            ('Annulé', '#E74C3C', 5, false, '[1,2,3]', '{\"send_email\": true, \"send_sms\": true}', CURRENT_TIMESTAMP)
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS repair_history');
        $this->addSql('DROP TABLE IF EXISTS repair');
        $this->addSql('DROP TABLE IF EXISTS users_sites');
        $this->addSql('DROP TABLE IF EXISTS "user"');
        $this->addSql('DROP TABLE IF EXISTS status');
        $this->addSql('DROP TABLE IF EXISTS site');
    }
}