<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Astronauta;

function resultado(bool $ok) : string {
    return $ok ? "OK" : "RECUSADO";
}

$astro = new Astronauta("Cmdr. Lima", 2);
echo $astro->resumo();

echo PHP_EOL . "--- Ordem inadequada com tudo cheio ---" . PHP_EOL;
echo "usarCilindro(): " . resultado($astro->usarCilindro()) . PHP_EOL;
echo "descansar(): " . resultado($astro->descansar()) . PHP_EOL;
echo "alimentar(): " . resultado($astro->alimentar()) . PHP_EOL;

echo PHP_EOL . "--- Exploração até a condição crítica ---" . PHP_EOL;
for ($i = 1; $i <= 5; $i++) {
    echo "explorar() #{$i}: " . resultado($astro->explorar()) . PHP_EOL;
    echo $astro->resumo();
    echo PHP_EOL;

    if ($astro->emCondicaoCritica()){
        break;
    }
}

echo "--- Oxigênio zerado: exploração bloqueada ---" . PHP_EOL;
echo "explorar(): " . resultado($astro->explorar()) . PHP_EOL;
echo "descansar(): " . resultado($astro->descansar()) . PHP_EOL;
echo $astro->resumo();

echo PHP_EOL . "--- Dano e recuperação ---" . PHP_EOL;
echo "sofrerDano(45): " . resultado($astro->sofrerDano(45)) . PHP_EOL;
echo "alimentar(): " . resultado($astro->alimentar()) . PHP_EOL;
echo $astro->resumo();

echo PHP_EOL . "--- Recuperação de oxigênio com cilindro ---" . PHP_EOL;
echo "usarCilindro() #1: " . resultado($astro->usarCilindro()) . PHP_EOL;
echo "usarCilindro() #2: " . resultado($astro->usarCilindro()) . PHP_EOL;
echo "usarCilindro() #3 sem cargas: " . resultado($astro->usarCilindro()) . PHP_EOL;
echo $astro->resumo();
echo "explorar() após recuperar: " . resultado($astro->explorar()) . PHP_EOL;
echo $astro->resumo();
