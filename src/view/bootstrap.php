<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."Etoque/src/model/classes"), $isDevMode);

$conn = array(
      		'driver' => 'pdo_mysql',
    		'user'=>'root',
    		'password'=>'0412',
    		'dbname'=>'estoque'
        	);

$entityManager = EntityManager::create($conn, $config);
