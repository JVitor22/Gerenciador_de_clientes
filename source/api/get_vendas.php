<?php
namespace Source\api;
use Source\Control\ControlVenda;
include __DIR__.'/../../vendor/autoload.php';
include __DIR__.'/../Control/ControlVenda.php';

$vendaControl= new ControlVenda();
header('Content-type: application/json');
if ($vendaControl->findEspecific()) {
	http_response_code(200);
	echo json_encode($vendaControl->findEspecific());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>