<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractDAO
 *
 * @author Kaiowa
 */

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class AbstractDAO {
    
    public $entityManager;
            private $entityPath;
            public function __construct($entityPath) {
                            $this->entityPath = $entityPath;
                            $this->entityManager = $this->createEntityManager ();
                    }
            public function createEntityManager() {
                    $path = array (
                        'src/model'
                    );
                    $devMode = true;
                    $config = Setup::createAnnotationMetadataConfiguration ( $path, $devMode );
                    $connectionOptions =  array (
                        'dbname' => 'entrega',
                        'user' => 'root',
                        'password' => '0412',
                        'host' => 'localhost',
                        'driver' => 'pdo_mysql'
                    );
                    //Passo 3 - Objeto de persistencia
                    return EntityManager::create ( $connectionOptions, $config );
            }
            public function insert($obj){
                    $this->entityManager->persist($obj);
                    $this->entityManager->flush();
            }
            public function update($obj){
                    $this->entityManager->merge($obj);
                    $this->entityManager->flush();
            }
            public function delete($obj){
                    $this->entityManager->remove($obj);
                    $this->entityManager->flush();
            }
            public function findById($id) { 
                    return $this->entityManager ->find ( $this->entityPath ,$id) ; //busca
            }
            public function findAll(){ //retona uma collection
                    $collection = $this->entityManager ->getRepository ( $this->entityPath )->findAll ();
                    $data = array ();
                    foreach ( $collection as $obj ) {
                            $data [] = $obj;
                    }
                    return $data;
            }   
}
