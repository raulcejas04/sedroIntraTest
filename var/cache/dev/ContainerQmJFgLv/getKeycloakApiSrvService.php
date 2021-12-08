<?php

namespace ContainerQmJFgLv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKeycloakApiSrvService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Service\KeycloakApiSrv' shared autowired service.
     *
     * @return \App\Service\KeycloakApiSrv
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Service/KeycloakApiSrv.php';

        $container->services['App\\Service\\KeycloakApiSrv'] = $instance = new \App\Service\KeycloakApiSrv(($container->privates['parameter_bag'] ?? ($container->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container))));

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Service\\KeycloakApiSrv', $container));

        return $instance;
    }
}
