<?php

namespace Source\Models;
use Connection;
class Venda
{

    private $id_venda;

    private $valor;

    private $cliente;

    private $vendedor;

    private $data_venda;


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
        $sql = "INSERT INTO vendas(id_venda,valor,cliente,vendedor,tabela,data_venda) 
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
        $sql = "UPDATE vendas SET id_venda = :id_venda,valor = :valor,cliente = :cliente,vendedor = :vendedor,tabela = :tabel,data_venda = :data_venda)";
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
        $sql = "DELETE FROM vendas WHERE id_venda = :id_venda";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('id_venda', $id);
        $consulta->execute();
    }

    public function find($id = null)
    {
        $sql = "SELECT * FROM vendas WHERE id_venda = :id_venda";
        $consulta = Connection::prepare($sql);
        $consulta->bindValue('id_venda', $id);
        $consulta->execute();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM vendas";
        $consulta = Connection::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    public function lastSell($id_cliente){
        $query = "SELECT * FROM vendas WHERE date(vendas.data_venda) 
        BETWEEN (DATE_SUB(CURDATE(), INTERVAL 3 MONTH)) AND CURRENT_DATE";

    }
    public function highestSells()
    {
        $query = ("SELECT clientes.id_cliente , clientes.nome , vendedor.id_vendedor, vendedor.nome_vendedor, vendas.id_venda ,
        vendas.valor 
        FROM vendas
        INNER JOIN clientes ON vendas.id_venda_cliente = clientes.id_cliente
        INNER JOIN vendedor ON vendas.id_venda_vendedor = vendedor.id_vendedor
        WHERE
        vendas.valor > 100");
    }
    public function sumVendas(){
        $sql = "SELECT sum(vendas.valor) FROM vendas";
        $query = Connection::prepare($sql);
        $query->execute();
        return $query->fetchColumn();
       

    }
}
