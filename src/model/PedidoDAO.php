<?php
namespace src\model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoDAO
 *
 * @author Kaiowa
 */
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use src\model\AbstractDAO;
use src\model\UsuarioDAO;
use src\model\classes\Pedido;


class PedidoDAO extends AbstractDAO{

    public function __construct() {
		parent::__construct('LojaAgua\entidades\Pedido');
	}
    
}
