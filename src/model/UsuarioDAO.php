<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Kaiowa
 */

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use src\model\Usuario;
use src\model\AbstractDAO;


class UsuarioDAO extends AbstractDAO {

    public function __construct() {
		parent::__construct('src\model\Usuario');
	}
    
    
}
