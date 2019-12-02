<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Factory\AppFactory;
use Slim\App;

define('ROOT' , '/Gerenciador_de_clientes');
require __DIR__.'/vendor/autoload.php';

$app = new Slim\App;
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response->withRedirect(ROOT.'/FRONTEND/index.html');
    var_dump($request);
})->setName('home');
$app->get('/clientes', function ($request, $response,$args) {   
    return $response->withRedirect(ROOT.'/source/api/get_cliente.php');
});
$app->post('/cliente', function ($request, $response,$args) {   
    return $response->withRedirect(ROOT.'/source/api/post_cliente.php');
});
$app->run();