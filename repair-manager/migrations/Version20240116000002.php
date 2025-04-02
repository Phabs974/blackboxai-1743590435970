<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240116000002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insertion des données initiales';
    }

    public function up(Schema $schema): void
    {
        // Insertion des sites
        $this->addSql("INSERT INTO site (
            name, 
            address, 
            postal_code, 
            city, 
            phone, 
            email, 
            business_hours, 
            created_at
        ) VALUES 
        (
            'Saint-Pierre', 
            '123 Rue du Commerce', 
            '97410', 
            'Saint-Pierre', 
            '0262 25 25 25', 
            'saint-pierre@repair-manager.com',
            '{
                \"monday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"tuesday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"wednesday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"thursday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"friday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"saturday\": [\"09:00-12:00\"],
                \"sunday\": []
            }',
            CURRENT_TIMESTAMP
        ),
        (
            'Saint-André', 
            '456 Avenue Principale', 
            '97440', 
            'Saint-André', 
            '0262 35 35 35', 
            'saint-andre@repair-manager.com',
            '{
                \"monday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"tuesday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"wednesday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"thursday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"friday\": [\"09:00-12:00\", \"14:00-18:00\"],
                \"saturday\": [\"09:00-12:00\"],
                \"sunday\": []
            }',
            CURRENT_TIMESTAMP
        )");

        // Insertion de l'utilisateur administrateur
        // Mot de passe : Admin123! (à changer lors de la première connexion)
        $this->addSql("INSERT INTO \"user\" (
            email,
            roles,
            password,
            first_name,
            last_name,
            preferences,
            created_at
        ) VALUES (
            'admin@repair-manager.com',
            '[\"ROLE_ADMIN\"]',
            '\$2y\$13\$wHqN7Bg3RMGQbsK3YyBZKOPqTIJGZc.ZVZiPLPi1DcZT8vX1.ZKWC',
            'Admin',
            'System',
            '{
                \"theme\": \"light\",
                \"notifications\": {
                    \"email\": true,
                    \"browser\": true
                },
                \"display\": {
                    \"repairs_per_page\": 10,
                    \"default_sort\": \"createdAt\",
                    \"default_order\": \"DESC\"
                }
            }',
            CURRENT_TIMESTAMP
        )");

        // Récupération des IDs
        $adminId = $this->connection->lastInsertId();
        $saintPierreId = 1;
        $saintAndreId = 2;

        // Attribution des sites à l'administrateur
        $this->addSql("INSERT INTO users_sites (user_id, site_id) VALUES 
            ($adminId, $saintPierreId),
            ($adminId, $saintAndreId)
        ");

        // Insertion des techniciens par site
        $this->addSql("INSERT INTO \"user\" (
            email,
            roles,
            password,
            first_name,
            last_name,
            preferences,
            created_at
        ) VALUES 
        (
            'tech.sp@repair-manager.com',
            '[\"ROLE_TECHNICIAN\"]',
            '\$2y\$13\$wHqN7Bg3RMGQbsK3YyBZKOPqTIJGZc.ZVZiPLPi1DcZT8vX1.ZKWC',
            'Technicien',
            'Saint-Pierre',
            '{
                \"theme\": \"light\",
                \"notifications\": {
                    \"email\": true,
                    \"browser\": true
                },
                \"display\": {
                    \"repairs_per_page\": 10,
                    \"default_sort\": \"createdAt\",
                    \"default_order\": \"DESC\"
                }
            }',
            CURRENT_TIMESTAMP
        ),
        (
            'tech.sa@repair-manager.com',
            '[\"ROLE_TECHNICIAN\"]',
            '\$2y\$13\$wHqN7Bg3RMGQbsK3YyBZKOPqTIJGZc.ZVZiPLPi1DcZT8vX1.ZKWC',
            'Technicien',
            'Saint-André',
            '{
                \"theme\": \"light\",
                \"notifications\": {
                    \"email\": true,
                    \"browser\": true
                },
                \"display\": {
                    \"repairs_per_page\": 10,
                    \"default_sort\": \"createdAt\",
                    \"default_order\": \"DESC\"
                }
            }',
            CURRENT_TIMESTAMP
        )");

        // Attribution des sites aux techniciens
        $techSpId = $this->connection->lastInsertId() - 1;
        $techSaId = $this->connection->lastInsertId();

        $this->addSql("INSERT INTO users_sites (user_id, site_id) VALUES 
            ($techSpId, $saintPierreId),
            ($techSaId, $saintAndreId)
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM users_sites');
        $this->addSql('DELETE FROM "user"');
        $this->addSql('DELETE FROM site');
    }
}