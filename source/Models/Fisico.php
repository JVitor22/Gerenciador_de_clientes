<?php
namespace Source\Models;

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

    public function insert($obj)
    {
        $sql = "INSERT INTO cliente(nome,endereco,cidade,estado,email,tipo,telefone) 
        VALUES(:id_cliente,:endereco,:cidade,:estado,:email,:tipo,:telefone)";
        $query = Connection::prepare($sql);
        $query->bindValue('nome', $obj->nome);
        $query->bindValue('endereco', $obj->getEndereco);
        $query->bindValue('cidade', $obj->getCidade);
        $query->bindValue('estado', $obj->getEstado);
        $query->bindValue('email', $obj->getEmail);
        $query->bindValue('tipo', $obj->getTipo);
        $query->bindValue('telefone', $obj->getTelefone);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $result['id_cliente'];
        $query->execute();
        $query2 = "INSERT INTO cliente(nome,endereco,cidade,estado,email,tipo,telefone,rg,cpf) 
        VALUES(:id_cliente,:endereco,:cidade,:estado,:email,:tipo,:telefone,rg,cpf)";
        $query2->bindValue('nome', $obj->nome);
        $query2->bindValue('endereco', $obj->getEndereco);
        $query2->bindValue('cidade', $obj->getCidade);
        $query2->bindValue('estado', $obj->getEstado);
        $query2->bindValue('email', $obj->getEmail);
        $query2->bindValue('tipo', $obj->getTipo);
        $query2->bindValue('telefone', $obj->getTelefone);
        $query2->execute();
        
    }
    public function delete($obj, $id = null)
    {
        $sql = "DELETE FROM venda WHERE id_venda = :id_venda";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('id_venda', $id);
        $consulta->execute();
    }

    public function find($id = null)
    {
        $sql = "SELECT * FROM venda WHERE id_venda = :id_venda";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('id_venda', $id);
        $consulta->execute();
    }
}

