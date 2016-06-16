<?php
use Doctrine\Common\ClassLoader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Doctrine {
    public $entityManager = NULL;

    public function __construct()
    {
        // load database configuration from CI
        require_once APPPATH.'config/database.php';

        // register all entities class to the ClassLoader
        (new ClassLoader('Entities', APPPATH.'models'))->register();

        // register all repositories class to the ClassLoader
        (new ClassLoader('Repositories', APPPATH.'models'))->register();

        $entityPath = array(APPPATH.'models/Entities');
        $proxyDir = APPPATH.'models/proxies';
        $isDevMode = ENVIRONMENT === 'development';

        $dbParams = array(
            'driver'   => $db['default']['dbdriver'],
            'user'     => $db['default']['username'],
            'password' => $db['default']['password'],
            'host'     => $db['default']['hostname'],
            'dbname'   => $db['default']['database'],
            'charset'  => $db['default']['char_set']
        );
        $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '../../db.sqlite',
        );
        $config = Setup::createAnnotationMetadataConfiguration($entityPath, $isDevMode, $proxyDir);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }
}
