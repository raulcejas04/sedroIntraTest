<?php

namespace ContainerIR450Fh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMenuControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\MenuController' shared autowired service.
     *
     * @return \App\Controller\MenuController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/MenuController.php';

        $container->services['App\\Controller\\MenuController'] = $instance = new \App\Controller\MenuController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\MenuController', $container));

        return $instance;
    }
}