<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Semaforo;

$semaforo = new Semaforo("Rio Branco");

echo $semaforo->estado() . PHP_EOL;

for ($i = 0; $i < 7; $i++) {
    $semaforo->avancar();

    echo $semaforo->estado() . PHP_EOL;
    echo PHP_EOL;
}