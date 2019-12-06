<?php
namespace source\api;
require __DIR__.'/../../vendor/autoload.php';
use Source\Control\ControlCliente;


header('Content-type: application/json');
$inative = new ControlCliente();

if($inative->findInatives()){
    http_response_code(200);
    echo json_encode($inative->findInatives());
    
}else{
    \http_response_code(400);
    echo json_encode(array("mensagem" => "Não encontrado"));
}

