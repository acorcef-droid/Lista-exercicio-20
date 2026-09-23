<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\CompartimentoLocker;

function resultado(bool $ok): string
{
    return $ok ? "OK" : "RECUSADO";
}

$c1 = new CompartimentoLocker(1);

echo $c1->situacao();

echo "Depositar: " . resultado($c1->depositar("ENC-1001", "4821")) . PHP_EOL;
echo $c1->situacao();

echo "Código errado: " . resultado($c1->retirar("0000")) . PHP_EOL;
echo $c1->situacao();

echo "Código errado: " . resultado($c1->retirar("1111")) . PHP_EOL;
echo $c1->situacao();

echo "Código errado: " . resultado($c1->retirar("2222")) . PHP_EOL;
echo $c1->situacao();

echo "Tentar retirar bloqueado: " . resultado($c1->retirar("4821")) . PHP_EOL;

echo "Redefinir bloqueio: " . resultado($c1->redefinirBloqueio()) . PHP_EOL;
echo $c1->situacao();

echo "Retirar código correto: " . resultado($c1->retirar("4821")) . PHP_EOL;
echo $c1->situacao();

