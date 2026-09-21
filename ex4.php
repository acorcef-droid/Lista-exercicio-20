<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\CronometroTreino;

$cronometro = new CronometroTreino("Cronometro Educação Fisica");

$cronometro->adicionarTempo(3600);
$cronometro->adicionarTempo(1800);
$cronometro->adicionarTempo(900);

echo "Atividade: " . $cronometro->atividade . PHP_EOL;
echo "Tempo total: " . $cronometro->formatarTempo() . PHP_EOL;
echo "Total em minutos: " . $cronometro->totalMinutos() . PHP_EOL;

$cronometro->zerar();

echo "Depois de zerar: " . $cronometro->formatarTempo() . PHP_EOL;

//teste 