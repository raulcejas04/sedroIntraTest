<?php

namespace ContainerQmJFgLv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_BQ55FdrService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.BQ55Fdr' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.BQ55Fdr'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'rolKeycloak' => ['privates', '.errored.AY5H8Eh', NULL, 'Cannot determine controller argument for "App\\Controller\\RolKeycloakController::edit()": the $rolKeycloak argument is type-hinted with the non-existent class or interface: "App\\Entity\\RolKeycloak".'],
        ], [
            'rolKeycloak' => '?',
        ]);
    }
}
