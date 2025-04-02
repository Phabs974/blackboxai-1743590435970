<?php

namespace Container4ElTk0M;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGenerateTrackingTokensCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\GenerateTrackingTokensCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\GenerateTrackingTokensCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:generate-tracking-tokens', [], 'Génère les tokens de suivi pour les réparations qui n\'en ont pas', false, #[\Closure(name: 'App\\Command\\GenerateTrackingTokensCommand')] fn (): \App\Command\GenerateTrackingTokensCommand => ($container->privates['App\\Command\\GenerateTrackingTokensCommand'] ?? $container->load('getGenerateTrackingTokensCommandService')));
    }
}
