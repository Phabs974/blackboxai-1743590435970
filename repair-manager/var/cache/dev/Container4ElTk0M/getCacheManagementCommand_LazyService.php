<?php

namespace Container4ElTk0M;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCacheManagementCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\CacheManagementCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\CacheManagementCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:cache-manage', [], 'Gère le cache Redis de l\'application', false, #[\Closure(name: 'App\\Command\\CacheManagementCommand')] fn (): \App\Command\CacheManagementCommand => ($container->privates['App\\Command\\CacheManagementCommand'] ?? $container->load('getCacheManagementCommandService')));
    }
}
