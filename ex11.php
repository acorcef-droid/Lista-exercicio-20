<?php 

require_once __DIR__ . "/vendor/autoload.php";

use App\CartaoTransporte;

$c1 = new CartaoTransporte("Felippe", 10, 3);

echo $c1->resumo() . PHP_EOL;

$c1->embarcar();

echo $c1->resumo() . PHP_EOL;

echo "Tentando recarregar -20..." . PHP_EOL;
if (!$c1->recarregar(-20)){
    echo "Valor invalido para recarga." . PHP_EOL;
}
echo $c1->resumo() . PHP_EOL;

echo "Tentando recarregar 20" . PHP_EOL;
$c1->recarregar(20);
echo $c1->resumo() . PHP_EOL;

$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();
$c1->embarcar();

echo "Tentando embarcar sem saldo..." . PHP_EOL;

if (!$c1->embarcar()){
    echo "Não há saldo para o embarque." . PHP_EOL;
}
echo $c1->resumo() . PHP_EOL;