<?php

abstract class Clientes{
    protected $codigo;
    protected $nome;
    protected $endereco;
    protected $cidade;
    protected $estado;
    protected $email;
    protected $tipo;
    protected $telefone;
   
    abstract protected function retornarCpf();
    //CONSTRUTOR 
        //  |
        //  v
        
    protected function __construct($codigo, $nome, $endereco, $cidade, $estado, $email, $tipo, $telefone ){
       $this->codigo = $codigo;
       $this->nome = $nome;
       $this->endereco = $endereco;
       $this->cidade = $cidade;
       $this->estado = $estado;
       $this->email = $email;
       $this->tipo = $tipo;
       $this->telefone = $telefone;
    }
    
    public function imprimir(){
        echo "  " . $this->retornarCpf();
    }
    
    
    // M�TODOS GET ---------------
    //  |
    //  v
    
    
    public function getCodigo(){
        return $this->codigo;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    
    // M�TODOS SET ---------------
        //  |
        //  v
        
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
     
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    
    function teste(){
        $msg = "Funcionou teste json";
        echo json_decode($msg);
        
    }
    
    
    
    
    
}

