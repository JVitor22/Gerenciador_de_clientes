<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Factory\AppFactory;
use Slim\App;
use Source\Control\ControlCliente;

use function PHPSTORM_META\map;

define('ROOT', '/Gerenciador_de_clientes');
require __DIR__ . '/vendor/autoload.php';
$config = [
    'settings' => [
        'displayErrorDetails' => true
    ],
];
$c = new \Slim\Container($config);
$app = new Slim\App($c);

/*$app->get('/clientes', function ($request, $response,$args) {   
    return $response->withRedirect(ROOT.'/source/api/get_cliente.php');
});*/
$app->get('/vendas', function ($request, $response, $args) {
    return $response->withRedirect(ROOT . '/source/api/get_vendas.php');
});
$app->post('/clientes', function ($request, $response) {
    $body = $request->getBody();
    $cliente = json_decode($body);
    $sql = "INSERT INTO clientes(nome,endereco,cidade,email,tipo,telefone) VALUES
    (:nome, :endereco,:cidade,:email,:tipo,:telefone)";
    $conn = Connection::prepare($sql);
    $conn->bindValue('nome' , $cliente->nome);
    $conn->bindValue('endereco' , $cliente->endereco);
    $conn->bindValue('cidade' , $cliente->cidade);
    $conn->bindValue('email' , $cliente->email);
    $conn->bindValue('tipo' , $cliente->tipo);
    $conn->bindValue('telefone' , $cliente->telefone);
    $conn->execute();
    return $response->withJson($cliente);
});
$app->post('/vendas', function ($request, $response) {
    $body = $request->getBody();
    $venda = json_decode($body);
    $sql = "INSERT INTO vendas(valor,id_venda_cliente,id_venda_vendedor,data_venda) VALUES
    (:valor, :id_venda_cliente,:id_venda_vendedor,:data_venda)";
    $conn = Connection::prepare($sql);
    $conn->bindValue('valor' , $venda->valor);
    $conn->bindValue('id_venda_cliente' , $venda->id_venda_cliente);
    $conn->bindValue('id_venda_vendedor' , $venda->id_venda_vendedor);
    $conn->bindValue('data_venda' , $venda->data_venda);
    $conn->execute();
    return $response->withJson($venda);
});
    


$app->get('/clientes', function ($request, $response) {
    return $response->withRedirect(ROOT . '/source/api/get_cliente.php');
});
$app->get('/', function ($request, $response, $args) {
    return $response->withStatus(302)->withHeader('Location', ROOT . '/FRONTEND/index.html');
});
$app->get('/numClientes', function ($request, $response) {
    return $response->withStatus(302)->withHeader('Location', ROOT . '/source/api/get_num_cliente.php');
});
$app->get('/inativos', function ($request, $response) {
    return $response->withRedirect(ROOT . '/source/api/get_inativos.php');
});


$app->run();




/*$app->map(['GET', 'POST'], '/clientes', function (Request $request, Response $response, $args) {
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request) {
        case 'GET':
            return $response->withStatus(302)->withRedirect(ROOT.'/source/api/get_cliente.php');
            break;
        case 'POST':
            return $response->withRedirect(ROOT.'/source/api/post_cliente.php');
            break;
        default:
            return $response->withStatus(400)->write('bad reqeut');
            break;
    }
});*/
