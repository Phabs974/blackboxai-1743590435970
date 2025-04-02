<?php

namespace Container4ElTk0M;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLogMaintenanceCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\LogMaintenanceCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\LogMaintenanceCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:logs:maintain', [], 'Nettoie les logs anciens et effectue une rotation des fichiers', false, #[\Closure(name: 'App\\Command\\LogMaintenanceCommand')] fn (): \App\Command\LogMaintenanceCommand => ($container->privates['App\\Command\\LogMaintenanceCommand'] ?? $container->load('getLogMaintenanceCommandService')));
    }
}
