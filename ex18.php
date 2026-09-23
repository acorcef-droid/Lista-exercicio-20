<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\PlanoDados;

function resultado(bool $ok) : string {
    return $ok ? "OK" : "RECUSADO";
}

$ana = new PlanoDados("Ana", 10);
$bruno = new PlanoDados("Bruno", 2.5);

echo "=== Plano da Ana (10 GB) ===" . PHP_EOL;
echo $ana->resumo();
echo "consumir(3.5): " . resultado($ana->consumir(3.5)) . PHP_EOL;
echo "consumir(4): " . resultado($ana->consumir(4)) . PHP_EOL;
echo "consumir(-1) valor inválido: " . resultado($ana->consumir(-1)) . PHP_EOL;
echo "consumir(5) maior que o saldo: " . resultado($ana->consumir(5)) . PHP_EOL;
echo $ana->resumo();

echo PHP_EOL . "=== Plano do Bruno (2.5 GB) ===" . PHP_EOL;
echo $bruno->resumo();
echo "consumir(1): " . resultado($bruno->consumir(1)) . PHP_EOL;
echo "consumir(2) maior que o saldo: " . resultado($bruno->consumir(2)) . PHP_EOL;
echo "consumir(1.5) zera a franquia: " . resultado($bruno->consumir(1.5)) . PHP_EOL;
echo $bruno->resumo();
echo "consumir(0.1) com franquia zerada: " . resultado($bruno->consumir(0.1)) . PHP_EOL;

echo PHP_EOL . "--- Compra de pacote adicional ---" . PHP_EOL;
echo "comprarPacote(0): " . resultado($bruno->comprarPacote(0)) . PHP_EOL;
echo "comprarPacote(5): " . resultado($bruno->comprarPacote(5)) . PHP_EOL;
echo "consumir(2): " . resultado($bruno->consumir(2)) . PHP_EOL;
echo $bruno->resumo();
echo "Saldo restante: " . number_format($bruno->saldoRestante(), 2) . " GB" . PHP_EOL;
echo "Total consumido: " . number_format($bruno->totalConsumido(), 2) . " GB" . PHP_EOL;
