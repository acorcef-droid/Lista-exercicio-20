<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\TermostatoInteligente;

$termostato = new TermostatoInteligente(25);

echo "Temperatura comum:" . PHP_EOL;
echo $termostato->descricao() . PHP_EOL . PHP_EOL;

$termostato->alterar(-10);

echo "Temperatura negativa:" . PHP_EOL;
echo $termostato->descricao() . PHP_EOL . PHP_EOL;

$resultado = $termostato->alterar(-300);

echo "Tentativa de alterar para -300°C:" . PHP_EOL;
echo "Alteração realizada? " . ($resultado ? "Sim" : "Não") . PHP_EOL;
echo "Temperatura atual: " . $termostato->descricao() . PHP_EOL;
