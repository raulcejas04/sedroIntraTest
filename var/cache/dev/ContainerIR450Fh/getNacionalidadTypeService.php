<?php

namespace ContainerIR450Fh;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNacionalidadTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\NacionalidadType' shared autowired service.
     *
     * @return \App\Form\NacionalidadType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/NacionalidadType.php';

        return $container->privates['App\\Form\\NacionalidadType'] = new \App\Form\NacionalidadType();
    }
}
