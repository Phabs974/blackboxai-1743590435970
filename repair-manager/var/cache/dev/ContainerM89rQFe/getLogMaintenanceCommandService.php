<?php

namespace ContainerM89rQFe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLogMaintenanceCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\LogMaintenanceCommand' shared autowired service.
     *
     * @return \App\Command\LogMaintenanceCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/src/Command/LogMaintenanceCommand.php';

        $container->privates['App\\Command\\LogMaintenanceCommand'] = $instance = new \App\Command\LogMaintenanceCommand(($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container)), \dirname(__DIR__, 4), ($container->privates['App\\Repository\\AuditLogRepository'] ?? $container->load('getAuditLogRepositoryService')));

        $instance->setName('app:logs:maintain');
        $instance->setDescription('Nettoie les logs anciens et effectue une rotation des fichiers');

        return $instance;
    }
}
