<?php

namespace ContainerQmJFgLv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSimplethingsEntityaudit_ConfigService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'simplethings_entityaudit.config' shared service.
     *
     * @return \SimpleThings\EntityAudit\AuditConfiguration
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/sonata-project/entity-audit-bundle/src/AuditConfiguration.php';
        include_once \dirname(__DIR__, 4).'/vendor/sonata-project/entity-audit-bundle/src/User/TokenStorageUsernameCallable.php';

        $container->services['simplethings_entityaudit.config'] = $instance = new \SimpleThings\EntityAudit\AuditConfiguration();

        $instance->setAuditedEntityClasses($container->parameters['simplethings.entityaudit.audited_entities']);
        $instance->setGlobalIgnoreColumns([]);
        $instance->setTablePrefix('');
        $instance->setTableSuffix('_audit');
        $instance->setRevisionTableName('revisions');
        $instance->setRevisionIdFieldType('integer');
        $instance->setRevisionFieldName('rev');
        $instance->setRevisionTypeFieldName('revtype');
        $instance->setUsernameCallable(new \SimpleThings\EntityAudit\User\TokenStorageUsernameCallable($container));

        return $instance;
    }
}
