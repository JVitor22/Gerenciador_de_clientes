<?php
namespace Source\api;
use Source\Control\ControlCliente;
include __DIR__.'/../../vendor/autoload.php';
include __DIR__.'/../Control/ControlCliente.php';

$clienteControl = new ControlCliente();
header('Content-type: application/json');
if ($clienteControl->findAll()) {
	http_response_code(200);
	echo json_encode($clienteControl->findAll());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>