<?php
namespace src\controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoC
 *
 * @author Kaiowa
 */
use src\model\PedidoDAO;
use src\model\classes\Pedido;
use src\model\classes\Item;
use src\model\classes\Usuario;
use DateTime;


class PedidoC extends AbstractC{
    
    public function __construct() {
        parent::__construct (new PedidoDAO());
    }
    
    public function insert($json){
        $itens = array();
        
        foreach ($jason->itens as $item){
        $i = new Item();
        $i-setQuantidade($item->quanntidade);
        $i->setProduto($item->produto);
        $itens[] = $i;
    }
        $user = new Usuario($jason->UsuarioId);
        $hora = new DateTime("now");
	$pedido = new Pedido(0,$hora,$user,$itens);
    $this->getDao ()->insert ( $pedido );
    return array("sucess"=>"true","input"=>$json);   
    }
    public function update($id, $jason){}
    public function delete($id) {}
}
