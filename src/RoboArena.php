<?php

namespace App;

use Exception;

class RoboArena
{
    private int $energia;
    private int $integridade;
    private int $pontuacao;

    public function __construct(
        public string $nome,
        int $energia = 100,
        int $integridade = 100,
        int $pontuacao = 0
    ) {
        if (empty($nome)) {
            throw new Exception("O nome do robô está vazio.");
        }

        $this->energia = $this->limitador($energia);
        $this->integridade = $this->limitador($integridade);
        $this->pontuacao = $pontuacao;

        if ($this->pontuacao < 0) {
            $this->pontuacao = 0;
        }
    }

    private function limitador(int $valor): int
    {
        if ($valor < 0) {
            return 0;
        }

        if ($valor > 100) {
            return 100;
        }

        return $valor;
    }

    public function treinar(): bool
    {
        if ($this->integridade <= 0 || $this->energia < 15) {
            return false;
        }

        $this->energia -= 15;
        $this->pontuacao += 10;

        return true;
    }

    public function combater(): bool
    {
        if ($this->integridade <= 0 || $this->energia < 30) {
            return false;
        }

        $this->energia -= 30;
        $this->integridade = $this->limitador($this->integridade - 20);

        return true;
    }

    public function reparar(int $pontos): bool
    {
        if ($pontos <= 0 || $this->integridade >= 100) {
            return false;
        }

        $this->integridade = $this->limitador($this->integridade + $pontos);

        return true;
    }

    public function recarregar(int $pontos): bool
    {
        if ($pontos <= 0 || $this->energia >= 100) {
            return false;
        }

        $this->energia = $this->limitador($this->energia + $pontos);

        return true;
    }

    public function status(): string
    {
        return "Robô: " . $this->nome . PHP_EOL .
               "Energia: " . $this->energia . "/100" . PHP_EOL .
               "Integridade: " . $this->integridade . "/100" . PHP_EOL .
               "Pontuação: " . $this->pontuacao . PHP_EOL;
    }
}