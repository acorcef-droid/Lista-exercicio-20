<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\RoboArena;

function resultado(bool $ok): string
{
    return $ok ? "OK" : "RECUSADO";
}

$robo = new RoboArena("Rex");

echo $robo->status();

echo "Treinar: " . resultado($robo->treinar()) . PHP_EOL;
echo "Combater: " . resultado($robo->combater()) . PHP_EOL;
echo "Combater: " . resultado($robo->combater()) . PHP_EOL;

echo $robo->status();

echo "Recarregar 500: " . resultado($robo->recarregar(500)) . PHP_EOL;
echo "Reparar 500: " . resultado($robo->reparar(500)) . PHP_EOL;

echo $robo->status();

echo PHP_EOL . "=== Testando limites ===" . PHP_EOL;

$zeta = new RoboArena("Zeta", 50, 40, 20);

echo $zeta->status();

echo "Treinar: " . resultado($zeta->treinar()) . PHP_EOL;
echo "Combater: " . resultado($zeta->combater()) . PHP_EOL;
echo "Recarregar 60: " . resultado($zeta->recarregar(60)) . PHP_EOL;
echo "Reparar 30: " . resultado($zeta->reparar(30)) . PHP_EOL;

echo $zeta->status();