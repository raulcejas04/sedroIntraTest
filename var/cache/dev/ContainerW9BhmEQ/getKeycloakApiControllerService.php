<?php

namespace ContainerW9BhmEQ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKeycloakApiControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\KeycloakApiController' shared autowired service.
     *
     * @return \App\Controller\KeycloakApiController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/KeycloakApiController.php';
        include_once \dirname(__DIR__, 4).'/vendor/knpuniversity/oauth2-client-bundle/src/Client/ClientRegistry.php';

        $container->services['App\\Controller\\KeycloakApiController'] = $instance = new \App\Controller\KeycloakApiController($container, ($container->services['knpu.oauth2.registry'] ?? ($container->services['knpu.oauth2.registry'] = new \KnpU\OAuth2ClientBundle\Client\ClientRegistry($container, ['keycloak' => 'knpu.oauth2.client.keycloak']))));

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\KeycloakApiController', $container));

        return $instance;
    }
}
