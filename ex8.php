<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\LampadaInteligente;

$lampada1 = new LampadaInteligente("Sala");
$lampada2 = new LampadaInteligente("Quarto");

echo $lampada1->status() . PHP_EOL;
echo $lampada2->status() . PHP_EOL;

echo PHP_EOL;

$lampada1->ligar();
$lampada1->ajustarIntensidade(80);

$lampada2->ligar();
$lampada2->ajustarIntensidade(30);

echo $lampada1->status() . PHP_EOL;
echo $lampada2->status() . PHP_EOL;

echo PHP_EOL;

$lampada1->desligar();

echo $lampada1->status() . PHP_EOL;

echo PHP_EOL;

echo "Tentando colocar intensidade 120 na lampada 1..." . PHP_EOL;
if (!$lampada1->ajustarIntensidade(120)) {
    echo "Intensidade inválida!" . PHP_EOL;
}

echo $lampada1->status() . PHP_EOL;

echo PHP_EOL;

echo "Tentando colocar intensidade -10 na lampada 2..." . PHP_EOL;
if (!$lampada2->ajustarIntensidade(-10)) {
    echo "Intensidade inválida!" . PHP_EOL;
}

echo $lampada2->status() . PHP_EOL;