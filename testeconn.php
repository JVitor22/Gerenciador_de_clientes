<?php

use Source\Control\ControlCliente;

require __DIR__.'/vendor/autoload.php';

$threeMonthsAgo = strtotime('-3 Months');

var_dump(date('Y-d-m' , $threeMonthsAgo));




$sql = "INSERT INTO clientes(clientes.nome,clientes.endereco,clientes.cidade,clientes.email,
clientes.tipo,clientes.telefone) VALUES ('nome' , 'endereco', 'cidade', 'email', 'J', 'telefone')";
$query = Connection::prepare($sql);

$query->execute(); 
if(isset($query)) echo "OK";

$c = new ControlCliente();
echo "NUMERO CLIENTES" . $c->numberClients();
