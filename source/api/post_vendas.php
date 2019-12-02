<?php

use Source\Control\ControlVenda;

include __DIR__.'/../control/PessoaControl.php';
 
header('Content-type: application/json');
$data = file_get_contents('php://input');
$obj =  json_decode($data);
if(!empty($data)){	
	try {
 		$vendaControl = new ControlVenda();
 		$answer = $vendaControl->insert($obj);
 		http_response_code(200);
 		$obj->id = $answer;
 		echo json_encode($obj);
 	}
 	catch (PDOException $e) {
 		http_response_code(400);
		echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
	}
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
?>