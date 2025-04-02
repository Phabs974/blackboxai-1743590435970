<?php

namespace Container4ElTk0M;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCommand_Bus_Middleware_HandleMessageService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'command.bus.middleware.handle_message' shared service.
     *
     * @return \Symfony\Component\Messenger\Middleware\HandleMessageMiddleware
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Middleware/MiddlewareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Middleware/HandleMessageMiddleware.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Handler/HandlersLocatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Handler/HandlersLocator.php';

        $container->privates['command.bus.middleware.handle_message'] = $instance = new \Symfony\Component\Messenger\Middleware\HandleMessageMiddleware(new \Symfony\Component\Messenger\Handler\HandlersLocator(['Symfony\\Component\\Process\\Messenger\\RunProcessMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.RLTyokt'] ?? $container->load('get_Messenger_HandlerDescriptor_RLTyoktService'));
        }, 1), 'Symfony\\Component\\Console\\Messenger\\RunCommandMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.kO873ol'] ?? $container->load('get_Messenger_HandlerDescriptor_KO873olService'));
        }, 1), 'Symfony\\Component\\Mailer\\Messenger\\SendEmailMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.CxXz94j'] ?? $container->load('get_Messenger_HandlerDescriptor_CxXz94jService'));
        }, 1), 'Symfony\\Component\\Messenger\\Message\\RedispatchMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.ugW8i0p'] ?? $container->load('get_Messenger_HandlerDescriptor_UgW8i0pService'));
        }, 1), 'Symfony\\Component\\Notifier\\Message\\ChatMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor._HSVyuF'] ?? $container->load('get_Messenger_HandlerDescriptor_HSVyuFService'));
        }, 1), 'Symfony\\Component\\Notifier\\Message\\SmsMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.1OvwcnV'] ?? $container->load('get_Messenger_HandlerDescriptor_1OvwcnVService'));
        }, 1), 'Symfony\\Component\\Notifier\\Message\\PushMessage' => new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['.messenger.handler_descriptor.WE2fjf7'] ?? $container->load('get_Messenger_HandlerDescriptor_WE2fjf7Service'));
        }, 1)]), false);

        $instance->setLogger(($container->privates['monolog.logger.messenger'] ?? $container->load('getMonolog_Logger_MessengerService')));

        return $instance;
    }
}
