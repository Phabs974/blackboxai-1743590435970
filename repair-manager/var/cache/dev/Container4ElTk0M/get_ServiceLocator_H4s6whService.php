<?php

namespace Container4ElTk0M;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_H4s6whService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator._h4s6wh' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator._h4s6wh'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'auditService' => ['privates', 'App\\Service\\AuditService', 'getAuditServiceService', false],
        ], [
            'auditService' => 'App\\Service\\AuditService',
        ]);
    }
}
