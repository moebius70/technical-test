<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$dbParams = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../data/wow.db'
];

$entityPaths = [__DIR__ . '/../src/Entity'];
$config = Setup::createAnnotationMetadataConfiguration($entityPaths, true);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
