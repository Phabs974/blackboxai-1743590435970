<?php

namespace ContainerM89rQFe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getStatusControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\StatusController' shared autowired service.
     *
     * @return \App\Controller\StatusController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/StatusController.php';

        $container->services['App\\Controller\\StatusController'] = $instance = new \App\Controller\StatusController();

        $instance->setContainer(($container->privates['.service_locator.erpk1LJ'] ?? $container->load('get_ServiceLocator_Erpk1LJService'))->withContext('App\\Controller\\StatusController', $container));

        return $instance;
    }
}
