<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\BateriaDispositivo;

$bateria = new BateriaDispositivo("Celular");

echo $bateria->status() . PHP_EOL;

echo "Usando por 10 minutos: ";
var_dump($bateria->usar(10));
echo $bateria->status() . PHP_EOL;

echo "Usando por 25 minutos: ";
var_dump($bateria->usar(25));
echo $bateria->status() . PHP_EOL;

echo "Usando por 100 minutos: ";
var_dump($bateria->usar(100));
echo $bateria->status() . PHP_EOL;

echo "Está crítica? ";
var_dump($bateria->estaCritica());

echo "Carregando 80%: ";
echo $bateria->carregar(80) . PHP_EOL;

echo $bateria->status() . PHP_EOL;