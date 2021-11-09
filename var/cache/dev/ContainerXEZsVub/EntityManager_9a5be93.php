<?php

namespace ContainerXEZsVub;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderd3d47 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer3e6a8 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesdd9b3 = [
        
    ];

    public function getConnection()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getConnection', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getMetadataFactory', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getExpressionBuilder', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'beginTransaction', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getCache', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getCache();
    }

    public function transactional($func)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'transactional', array('func' => $func), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'wrapInTransaction', array('func' => $func), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'commit', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->commit();
    }

    public function rollback()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'rollback', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getClassMetadata', array('className' => $className), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'createQuery', array('dql' => $dql), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'createNamedQuery', array('name' => $name), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'createQueryBuilder', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'flush', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'clear', array('entityName' => $entityName), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->clear($entityName);
    }

    public function close()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'close', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->close();
    }

    public function persist($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'persist', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'remove', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'refresh', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'detach', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'merge', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getRepository', array('entityName' => $entityName), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'contains', array('entity' => $entity), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getEventManager', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getConfiguration', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'isOpen', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getUnitOfWork', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getProxyFactory', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'initializeObject', array('obj' => $obj), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'getFilters', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'isFiltersStateClean', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'hasFilters', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return $this->valueHolderd3d47->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer3e6a8 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderd3d47) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderd3d47 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderd3d47->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__get', ['name' => $name], $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        if (isset(self::$publicPropertiesdd9b3[$name])) {
            return $this->valueHolderd3d47->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd3d47;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd3d47;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd3d47;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd3d47;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__isset', array('name' => $name), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd3d47;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderd3d47;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__unset', array('name' => $name), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd3d47;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderd3d47;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__clone', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        $this->valueHolderd3d47 = clone $this->valueHolderd3d47;
    }

    public function __sleep()
    {
        $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, '__sleep', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;

        return array('valueHolderd3d47');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer3e6a8 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer3e6a8;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer3e6a8 && ($this->initializer3e6a8->__invoke($valueHolderd3d47, $this, 'initializeProxy', array(), $this->initializer3e6a8) || 1) && $this->valueHolderd3d47 = $valueHolderd3d47;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderd3d47;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderd3d47;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
