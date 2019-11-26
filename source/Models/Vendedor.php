<?php
namespace Source\Models;

class Vendedor {

    private $id_vendedor;
    private $nome_vendedor;

    public function __construct($id_vendedor , $nome_vendedor){
        $this->id_vendedor = $id_vendedor;
        $this->nome_vendedor = $nome_vendedor;
    }


    public function getId_vendedor(){
        return $this->id_vendedor;
    }
    public function getNome_vendedor(){
        return $this->nome_vendedor;
    }
    public function setId_vendedor(){

    }
    public function setNome_vendedor($name){
        $this->nome_vendedor = $name;
    }



}