<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\PacoteEntrega;

function resultado(bool $ok) : string {
    return $ok ? "OK" : "RECUSADO";
}

echo "=== Cenário 1: entrega na primeira tentativa ===" . PHP_EOL;
$p1 = new PacoteEntrega("POO-001", "Rua das Flores, 100");
echo $p1->statusAtual();
echo "registrarFalha() sem estar em rota: " . resultado($p1->registrarFalha()) . PHP_EOL;
echo "sairParaEntrega(): " . resultado($p1->sairParaEntrega()) . PHP_EOL;
echo "confirmarEntrega(): " . resultado($p1->confirmarEntrega()) . PHP_EOL;
echo $p1->statusAtual();
echo "sairParaEntrega() após entregue: " . resultado($p1->sairParaEntrega()) . PHP_EOL;

echo PHP_EOL . "=== Cenário 2: falhas sucessivas e bloqueio da 4ª tentativa ===" . PHP_EOL;
$p2 = new PacoteEntrega("POO-002", "Av. Paulista, 900");

for ($i = 1; $i <= 3; $i++) {
    echo "Tentativa {$i}: sairParaEntrega() = " . resultado($p2->sairParaEntrega()) . PHP_EOL;
    echo "sairParaEntrega() enquanto em rota = " . resultado($p2->sairParaEntrega()) . PHP_EOL;
    echo "registrarFalha() = " . resultado($p2->registrarFalha()) . PHP_EOL;
    echo $p2->statusAtual();
    echo PHP_EOL;
}

echo "Quarta tentativa: sairParaEntrega() = " . resultado($p2->sairParaEntrega()) . PHP_EOL;
echo "confirmarEntrega() em devolução: " . resultado($p2->confirmarEntrega()) . PHP_EOL;
echo $p2->statusAtual();


$p3 = new PacoteEntrega("POO-003", "Jardim Cavallari, 50");
$p3->sairParaEntrega();
$p3->registrarFalha();
$p3->sairParaEntrega();
$p3->registrarFalha();
$p3->sairParaEntrega();
echo "confirmarEntrega(): " . resultado($p3->confirmarEntrega()) . PHP_EOL;
echo $p3->statusAtual();
