<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\CofrinhoMeta;

$cofrinho = new CofrinhoMeta("Comprar um computador", 1500 , 1000);

echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Depositando R$500..." . PHP_EOL;
$cofrinho->depositar(500);
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Depositando R$700..." . PHP_EOL;
$cofrinho->depositar(700);
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Tentando depositar R$-100..." . PHP_EOL;
if (!$cofrinho->depositar(-100)) {
    echo "Depósito inválido!" . PHP_EOL;
}
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Retirando R$200..." . PHP_EOL;
$cofrinho->retirar(200);
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Tentando retirar R$2000..." . PHP_EOL;
if (!$cofrinho->retirar(2000)) {
    echo "Não foi possível retirar: saldo insuficiente!" . PHP_EOL;
}
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

echo "Depositando R$500 para atingir a meta..." . PHP_EOL;
$cofrinho->depositar(500);
echo $cofrinho->resumo() . PHP_EOL;

echo PHP_EOL;

if ($cofrinho->metaAtingida()) {
    echo "Meta atingida!" . PHP_EOL;
} else {
    echo "Meta ainda não atingida." . PHP_EOL;
}