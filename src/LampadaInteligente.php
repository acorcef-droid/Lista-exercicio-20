<?php

namespace App;

use Exception;

class LampadaInteligente
{
    private bool $ligada;
    private int $intensidade;
    
    public function __construct(
        public string $local,
    )
    {
        if (empty($local)){
            throw new Exception("O local n deve estar vazio.");
        }

        $this->ligada = false;
        $this->intensidade = 50;
    }

    public function ligar() : void {
        $this->ligada = true;
    }

    public function desligar() : void {
        $this->ligada = false;
    }

    public function ajustarIntensidade(int $valor) : bool {
        if ($valor > 100 || $valor < 0){
            return false;
        }

        $this->intensidade = $valor;
        return true;
    }

    public function status() : string {
        return "Local: " . $this->local . PHP_EOL .
               "Estado: " . ($this->ligada ? "Ligado" : "Desligado") . PHP_EOL .
               "Intensidade: " . ($this->intensidade) . PHP_EOL;
    }
}