<?php
require 'Clientes.php';
class Fisico extends Clientes
{
     
    private $cpf;
    private $rg;

    
    public function getCpf()
    {
        return $this->cpf;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function __construct($codigo, $nome, $endereco, $cidade, 
        $estado, $email, $tipo, $telefone, $cpf, $rg)
    {
        parent::__construct($codigo, $nome, $endereco, $cidade,
            $estado, $email, $tipo, $telefone);
        $this->cpf = $cpf;
        $this->rg = $rg;
        
    }
    
    protected function retornarCpf(){
        return $this->getCpf();
    }
    
    public function __toString(){
        $resultado =
        "ID: " . parent::getCodigo() ."<br>" .
        "Nome: " . parent::getNome()."<br>" .
        "Endereco: " . parent::getEndereco()."<br>" .
        "Tipo: " . parent::getTipo()."<br>" .
        "Cpf: " . $this->getCpf();
        
        return "<br>" .  $resultado;
    }
}

