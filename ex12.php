<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Hidrometro;

$hidrometro = new Hidrometro("HID-001", 30);


$hidrometro->registrarLeitura(50.0);

$hidrometro->registrarLeitura(80.0);
echo "Consumo período 1: " . $hidrometro->consumoUltimoPeriodo() . "\n";

$hidrometro->registrarLeitura(120.0);
echo "Consumo período 2: " . $hidrometro->consumoUltimoPeriodo() . "\n";

$hidrometro->registrarLeitura(90.0);
echo "Consumo após tentativa inválida: " . $hidrometro->consumoUltimoPeriodo() . "\n";

echo $hidrometro->resumo() . "\n";
echo "Valor estimado da conta: R$" . $hidrometro->estimarConta(5.50);