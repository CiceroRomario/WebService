<?php
namespace src\model\classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Kaiowa
 */

/**
*   @Entity
*   @Table(name="usuario")
*/

class Usuario {
    //put your code here
    
private $id;
/**
 *
 * @var string @Column(type="string", length=20)
 */
private $email;
/**
 *
 * @var string @Column(type="string", length=10)
 */
private $senha;
/**
 *
 * @var string @Column(type="string", length=50)
 */
private $endereco;

    public function __construct($id = 0,$email= "" ,$senha= "" ,$endereco= "" ){
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->endereco = $endereco;
    }

    public static function construct($array){
        $obj = new Usuario();
        $obj->setId( $array['id']);
        $obj->setEmail( $array['email']);
        $obj->setSenha( $array['senha']);
        $obj->setEndereco( $array['endereco']);
        return $obj;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha=$senha;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco=$endereco;
    }

    public function equals($object){
        if($object instanceof Usuario){
            if($this->id!=$object->id){
                return false;
            }
            if($this->email!=$object->email){
                return false;
            }
            if($this->senha!=$object->senha){
                return false;
            }
            if($this->endereco!=$object->endereco){
                return false;
            }
            return true;
        }
        else{
        return false;
        }
    }
    
    public function toString(){
        return "  [id:" .$this->id. "]  [email:" .$this->email. "]  [senha:" .$this->senha. "]  [endereco:" .$this->endereco. "]  " ;
    }

    public function toArray(){
       return ["id"=>$this->id, "email"=>$this->email, "enderco"=>$this->endereco];
    }
}