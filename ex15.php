<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\DroneInspecao;

function resultado(bool $ok) : string {
    return $ok ? "OK" : "RECUSADO";
}

$drone = new DroneInspecao("Falcon X", 15);
echo $drone->status();

echo PHP_EOL . "--- Decolagem com pouca bateria (15%) ---" . PHP_EOL;
echo "decolar(): " . resultado($drone->decolar()) . PHP_EOL;

echo PHP_EOL . "--- Tentar voar sem decolar ---" . PHP_EOL;
echo "voar(2): " . resultado($drone->voar(2)) . PHP_EOL;

echo PHP_EOL . "--- Recarga ---" . PHP_EOL;
echo "recarregar(30): bateria = " . $drone->recarregar(30) . "%" . PHP_EOL;

echo PHP_EOL . "--- Voo válido ---" . PHP_EOL;
echo "decolar(): " . resultado($drone->decolar()) . PHP_EOL;
echo "decolar() já em voo: " . resultado($drone->decolar()) . PHP_EOL;
echo "voar(4): " . resultado($drone->voar(4)) . PHP_EOL;
echo $drone->status();

echo PHP_EOL . "--- Voo maior que a bateria permite (pede 10 km) ---" . PHP_EOL;
echo "voar(10): " . resultado($drone->voar(10)) . PHP_EOL;
echo $drone->status();

echo PHP_EOL . "--- Recarga acima do limite ---" . PHP_EOL;
echo "recarregar(200): bateria = " . $drone->recarregar(200) . "%" . PHP_EOL;

echo PHP_EOL . "--- Pouso ---" . PHP_EOL;
echo "pousar(): " . resultado($drone->pousar()) . PHP_EOL;
echo "pousar() de novo: " . resultado($drone->pousar()) . PHP_EOL;
echo $drone->status();
