<?php

namespace ContainerW9BhmEQ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRolKeycloakControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\RolKeycloakController' shared autowired service.
     *
     * @return \App\Controller\RolKeycloakController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/RolKeycloakController.php';

        $container->services['App\\Controller\\RolKeycloakController'] = $instance = new \App\Controller\RolKeycloakController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\RolKeycloakController', $container));

        return $instance;
    }
}
