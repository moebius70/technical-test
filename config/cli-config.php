<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = include __DIR__ . '/database.php';

return ConsoleRunner::createHelperSet($entityManager);
