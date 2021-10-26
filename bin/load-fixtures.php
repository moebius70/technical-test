<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

$entityManager = include __DIR__ . '/../config/database.php';

$loader = new Loader();
$loader->loadFromDirectory(__DIR__ . '/../src/DataFixtures');

$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());
