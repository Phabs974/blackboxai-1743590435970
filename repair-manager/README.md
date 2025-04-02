# Système de Gestion des Réparations de Consoles

## Fonctionnalités Principales

### 1. Gestion des Réparations
- Suivi détaillé des réparations
- Attribution de QR Code et code-barres
- Historique complet des modifications
- Gestion des délais et priorités
- Système de notification automatique

### 2. Système de Logs
- Logs applicatifs via Monolog
- Audit en base de données
- Gestion des exceptions
- Suivi des actions utilisateurs
- Maintenance automatique des logs

### 3. Gestion des Délais
- Calcul automatique des délais estimés
- Suivi des réparations en retard
- Notifications automatiques
- Ajustement selon la charge de travail
- Statistiques de performance

## Installation

1. Cloner le repository
```bash
git clone [url-du-repo]
```

2. Installer les dépendances
```bash
composer install
```

3. Configurer les variables d'environnement dans `.env.local`
```env
DATABASE_URL="postgresql://user:password@localhost:5432/repair_manager?serverVersion=15&charset=utf8"
MAILER_DSN=smtp://localhost:1025
ADMIN_EMAIL=admin@example.com
```

4. Créer la base de données et exécuter les migrations
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Configuration des Tâches Planifiées

### Maintenance des Logs
```bash
# Tous les jours à 1h du matin
0 1 * * * /usr/bin/php /chemin/vers/bin/console app:logs:maintain --archive
```

### Vérification des Délais
```bash
# Toutes les heures
0 * * * * /usr/bin/php /chemin/vers/bin/console app:repair:check-deadlines

# Vérification spécifique des retards
0 9 * * * /usr/bin/php /chemin/vers/bin/console app:repair:check-deadlines --check-type=overdue

# Vérification des échéances à venir (3 jours)
0 10 * * * /usr/bin/php /chemin/vers/bin/console app:repair:check-deadlines --check-type=upcoming --threshold=3
```

## Commandes Disponibles

### Gestion des Logs
```bash
# Nettoyer les logs
php bin/console app:logs:maintain

# Archiver les logs plus anciens que 60 jours
php bin/console app:logs:maintain --days=60 --archive
```

### Gestion des Délais
```bash
# Vérifier tous les délais
php bin/console app:repair:check-deadlines

# Vérifier uniquement les retards
php bin/console app:repair:check-deadlines --check-type=overdue

# Vérifier les échéances à venir avec seuil personnalisé
php bin/console app:repair:check-deadlines --check-type=upcoming --threshold=5
```

## Structure des Notifications

### Types de Notifications
1. Création de réparation
2. Changement de statut
3. Mise à jour de délai
4. Réparation en retard
5. Échéance approchante

### Destinataires
- Client (email)
- Technicien responsable
- Administrateur (pour les cas critiques)

## Sécurité et Permissions

### Rôles Disponibles
- ROLE_ADMIN : Accès complet
- ROLE_TECHNICIAN : Gestion des réparations
- ROLE_VENDOR : Création et suivi
- ROLE_USER : Consultation uniquement

### Restrictions par Site
- Les techniciens ne voient que les réparations de leur site
- Les administrateurs ont accès à tous les sites
- Les vendeurs peuvent créer des réparations pour leur site

## Maintenance et Sauvegarde

### Sauvegarde Automatique
- Base de données : quotidienne
- Fichiers uploadés : hebdomadaire
- Logs d'audit : mensuelle

### Rotation des Données
- Logs applicatifs : 90 jours
- Historique des réparations : conservation permanente
- Fichiers temporaires : 30 jours

## Support et Contact

Pour toute question ou assistance :
- Email : support@example.com
- Documentation technique : /docs
- Wiki interne : /wiki

## Contribution

1. Créer une branche pour la fonctionnalité
2. Commiter les changements
3. Créer une Pull Request
4. Attendre la review

## Licence

Ce projet est sous licence propriétaire. Tous droits réservés.