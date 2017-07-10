<?php

require_once "view/bootstrap.php";
use Doctrine\ORM\Tools\Console\ConsoleRunner;
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);