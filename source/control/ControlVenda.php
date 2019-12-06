<?php
namespace Source\Control;
use Source\Models\Venda;
use Connection;

class ControlVenda
{

    function insert($obj)
    {

        return Venda::insert($obj);
    }

    function update($obj, $id)
    {

        return Venda::update($obj, $id);
    }

    function delete($obj, $id)
    {

        return Venda::delete($obj, $id);
    }

    function find($id = null)
    {
        return Venda::find($id);
    }

    public function findAll()
    {
        return Venda::findAll();
    }

    public function sumVendas(){
        return Venda::sumVendas();
    }
    public function findEspecific(){
        $query = "SELECT vendas.id_venda , clientes.nome , vendas.valor , vendas.data_venda
        FROM vendas
        INNER JOIN clientes ON vendas.id_venda_cliente = clientes.id_cliente
        GROUP BY vendas.data_venda
        ORDER BY vendas.data_venda DESC";
        $conn = Connection::prepare($query);
        $conn->execute();
        return $conn->fetchAll();
    }
}
