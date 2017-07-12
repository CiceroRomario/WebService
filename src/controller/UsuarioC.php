<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioC
 *
 * @author Kaiowa
 */
class UsuarioC {
    
            public function __construct() {
                parent::__construct(new UsuarioDAO ());
            }
            
            public function insert($json){
                $user = new Usuario($json->id,$json->email,$json->senha,$json->endereco);
                $this->getDao ()->insert ( $user );
                return ["mensagem"=>"Usuario inserido com sucesso"];
            }

            public function update($id, $json){
                
            }
            public function delete($id){

            }
    
    
}
