<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Retangulo;

$retangulo1 = new Retangulo(10, 5);
$retangulo2 = new Retangulo(6, 6);

echo "Retângulo 1" . PHP_EOL;
echo "Área: " . $retangulo1->area() . PHP_EOL;
echo "Perímetro: " . $retangulo1->perimetro() . PHP_EOL;
echo "É quadrado? " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL . PHP_EOL;

echo "Retângulo 2" . PHP_EOL;
echo "Área: " . $retangulo2->area() . PHP_EOL;
echo "Perímetro: " . $retangulo2->perimetro() . PHP_EOL;
echo "É quadrado? " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

