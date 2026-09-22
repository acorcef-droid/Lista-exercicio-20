<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\MaquinaSnack;

$maquina = new MaquinaSnack("Chocolate", 8);


echo $maquina->status() . "\n";


$maquina->reabastecer(2);

echo $maquina->status() . "\n";

$maquina->inserirCredito(10.00);

echo $maquina->status() . "\n";

$maquina->comprar();

echo $maquina->status() . "\n";

$maquina->inserirCredito(10.00);

$maquina->comprar();

echo $maquina->status() . "\n";

echo "Crédito devolvido: " . $maquina->devolverCredito() . "\n";
echo $maquina->status() . "\n";
