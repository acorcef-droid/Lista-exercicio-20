<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\IngressoCinema;

$ingressoInteiro = new IngressoCinema("Vingadores", 40);
$ingressoMeia = new IngressoCinema("Vingadores", 40);

$ingressoMeia->definirMeiaEntrada(true);

echo "Ingresso inteiro:" . PHP_EOL;
echo $ingressoInteiro->resumo() . PHP_EOL . PHP_EOL;

echo "Ingresso meia-entrada:" . PHP_EOL;
echo $ingressoMeia->resumo() . PHP_EOL . PHP_EOL;

echo "Comparação dos valores:" . PHP_EOL;
echo "Inteira: R$ " . $ingressoInteiro->calcularValorFinal() . PHP_EOL;
echo "Meia-entrada: R$ " . $ingressoMeia->calcularValorFinal() . PHP_EOL;

