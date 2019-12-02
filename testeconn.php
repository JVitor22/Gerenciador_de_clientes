<?php

use Source\Control\ControlCliente;

require __DIR__.'/vendor/autoload.php';

$c = new ControlCliente();
$sql = $c->findAll();
print_r(json_encode($sql));