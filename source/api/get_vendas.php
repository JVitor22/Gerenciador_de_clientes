<?
namespace Source\api;
use Source\Control\ControlVenda;
include __DIR__.'/../../vendor/autoload.php';
include __DIR__.'/../control/ControlVendaphp';

$vendasControl = new ControlVenda();
header('Content-type: application/json');
if ($vendasControl->findAll()) {
	http_response_code(200);
	echo json_encode($vendasControl->findAll());
}
else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não encontrado"));
}
?>