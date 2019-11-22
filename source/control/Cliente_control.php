<?php
include __DIR__ . '/../vendor/autoload.php';

class ControlClientes
{

    function insert($obj)
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

    function findAll($obj)
    {
        
        return Cliente::findAll($obj);
    }
}
