<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Triangulo;


//equilátero
$t1 = new Triangulo(5, 5, 5);
echo "Lados: 5, 5, 5\n";
echo "Válido: " . ($t1->ehValido() ? "Sim" : "Não") . "\n";
echo "Classificação: " . $t1->classificar() . "\n";
echo "Perímetro: " . $t1->perimetro() . "\n\n";

//escaleno
$t2 = new Triangulo(3, 4, 5);
echo "Lados: 3, 4, 5\n";
echo "Válido: " . ($t2->ehValido() ? "Sim" : "Não") . "\n";
echo "Classificação: " . $t2->classificar() . "\n";
echo "Perímetro: " . $t2->perimetro() . "\n\n";

//não forma triângulo
$t3 = new Triangulo(1, 2, 10);
echo "Lados: 1, 2, 10\n";
echo "Válido: " . ($t3->ehValido() ? "Sim" : "Não") . "\n";
echo "Classificação: " . $t3->classificar() . "\n";
echo "Perímetro: " . $t3->perimetro() . "\n";