<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\PersonagemRPG;

$personagem = new PersonagemRPG("Valdir", "Guerreiro");

echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Recebendo 30 de dano..." . PHP_EOL;
$personagem->receberDano(30);
echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Curando 20 de vida..." . PHP_EOL;
$personagem->curar(20);
echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Usando habilidade com custo de 40 de energia..." . PHP_EOL;
$personagem->usarHabilidade(40);
echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Usando habilidade com custo de 70 de energia..." . PHP_EOL;
if (!$personagem->usarHabilidade(70)) {
    echo "Não foi possível usar a habilidade!" . PHP_EOL;
}
echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Descansando e recuperando 50 de energia..." . PHP_EOL;
$personagem->descansar(50);
echo $personagem->status() . PHP_EOL;

echo PHP_EOL;

echo "Tentando recuperar mais energia do que o limite..." . PHP_EOL;
$personagem->descansar(100);
echo $personagem->status() . PHP_EOL;