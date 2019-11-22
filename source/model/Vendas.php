<?php

class Venda
{

    private $id_venda;

    private $valor;

    private $cliente;

    private $vendedor;

    private $tabela;

    private $data_venda;

    public function __construct($id_venda, $valor, $cliente, $vendedor)
    {
        $this->id_venda = $id_venda;
        $this->id_venda = $valor;
        $this->id_venda = $cliente;
        $this->id_venda = $vendedor;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    public function getId_venda()
    {
        return $this->id_venda;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getVendedor()
    {
        return $this->vendedor;
    }

    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    }

    public function insert($obj)
    {
        $sql = "INSERT INTO venda(id_venda,valor,cliente,vendedor,tabela,data_venda) 
        VALUES(:id_venda,:valor,:cliente,:vendedor,:tabela,data_venda)";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('valor', $obj->valor);
        $consulta->bindValue('cliente', $obj->cliente);
        $consulta->bindValue('vendedor', $obj->vendedor);
        $consulta->bindValue('tabela', $obj->tabela);
        $consulta->bindValue('data_venda', $obj->data_venda);
        return $consulta->execute();
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE venda SET id_venda = :id_venda,valor = :valor,cliente = :cliente,vendedor = :vendedor,tabela = :tabel,data_venda = :data_venda)";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('id_venda', $obj->id_venda);
        $consulta->bindValue('valor', $obj->valor);
        $consulta->bindValue('cliente', $obj->cliente);
        $consulta->bindValue('vendedor', $obj->vendedor);
        $consulta->bindValue('tabela', $obj->tabela);
        $consulta->bindValue('data_venda', $obj->data_venda);
        return $consulta->execute();
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

    public function findAll()
    {
        $sql = "SELECT * FROM venda";
        $consulta = Connection::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}

