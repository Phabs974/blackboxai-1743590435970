<?php
require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use App\Entity\User;

$paths = [__DIR__ . "/src/Entity"];
$isDevMode = true;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'your_db_user',
    'password' => 'your_db_password',
    'dbname'   => 'your_db_name',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

$adminUsers = $entityManager->getRepository(User::class)->findByRole('ROLE_ADMIN');

if (count($adminUsers) > 0) {
    echo "Utilisateurs avec le rôle ADMIN :\n";
    foreach ($adminUsers as $user) {
        echo $user->getEmail() . "\n";
    }
} else {
    echo "Aucun utilisateur avec le rôle ADMIN trouvé.\n";
}