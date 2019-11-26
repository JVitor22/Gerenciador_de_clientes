<?php

namespace Source\Control;

use Source\Models\Cliente;

class ControlCliente
{

    public function insert($obj)
    {
        return Cliente::insert($obj);
    }

    function delete($obj, $id)
    {

        return Cliente::delete($obj, $id);
    }

    function update($obj, $id)
    {

        return Cliente::update($obj, $id);
    }

    function find($obj, $id)
    {

        return Cliente::find($obj, $id);
    }

    public function findAll()
    {
        return Cliente::findAll();
    }
}
