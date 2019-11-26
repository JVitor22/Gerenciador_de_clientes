<?php
namespace Source\Control;


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

    function findAll()
    {
        return Venda::findAll();
    }
}
