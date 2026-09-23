<?php

namespace App;

use Exception;

class Astronauta
{
    private int $vida = 100;
    private int $energia = 100;
    private int $oxigenio = 100;
    private int $cargasCilindro;

    public function __construct(
        public string $nome,
        int $cargasCilindro = 2
    ) {
        if (empty($nome)) {
            throw new Exception("O nome do astronauta está vazio.");
        }

        if ($cargasCilindro < 0) {
            $cargasCilindro = 0;
        }

        $this->cargasCilindro = $cargasCilindro;
    }

    private function limitar(int $valor): int
    {
        if ($valor < 0) {
            return 0;
        }

        if ($valor > 100) {
            return 100;
        }

        return $valor;
    }

    public function explorar(): bool
    {
        if ($this->vida <= 0 || $this->oxigenio <= 0) {
            return false;
        }

        if ($this->energia < 20 || $this->oxigenio < 25) {
            return false;
        }

        $this->energia -= 20;
        $this->oxigenio -= 25;

        return true;
    }

    public function descansar(): bool
    {
        if ($this->vida <= 0 || $this->energia >= 100) {
            return false;
        }

        $this->energia = $this->limitar($this->energia + 30);

        return true;
    }

    public function usarCilindro(): bool
    {
        if ($this->vida <= 0 || $this->cargasCilindro <= 0 || $this->oxigenio >= 100) {
            return false;
        }

        $this->cargasCilindro--;
        $this->oxigenio = $this->limitar($this->oxigenio + 40);

        return true;
    }

    public function alimentar(): bool
    {
        if ($this->vida <= 0) {
            return false;
        }

        if ($this->vida >= 100 && $this->energia >= 100) {
            return false;
        }

        $this->vida = $this->limitar($this->vida + 20);
        $this->energia = $this->limitar($this->energia + 10);

        return true;
    }

    public function sofrerDano(int $pontos): bool
    {
        if ($pontos <= 0 || $this->vida <= 0) {
            return false;
        }

        $this->vida = $this->limitar($this->vida - $pontos);

        return true;
    }

    public function emCondicaoCritica(): bool
    {
        return $this->vida <= 0 || $this->oxigenio <= 0;
    }

    public function resumo(): string
    {
        return "Astronauta: " . $this->nome . PHP_EOL .
               "Vida: " . $this->vida . "/100" . PHP_EOL .
               "Energia: " . $this->energia . "/100" . PHP_EOL .
               "Oxigênio: " . $this->oxigenio . "/100" . PHP_EOL .
               "Cargas do Cilindro: " . $this->cargasCilindro . PHP_EOL .
               "Situação: " . ($this->emCondicaoCritica() ? "crítica" : "estável") . PHP_EOL;
    }
}