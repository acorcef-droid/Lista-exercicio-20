<?php

namespace App;

use Exception;

class PlanoDados
{
    private float $saldo;
    private float $consumoMes = 0;

    public function __construct(
        public string $cliente,
        float $franquia
    )
    {
        if (empty($cliente)) {
            throw new Exception("O nome do cliente está vazio.");
        }

        $this->saldo = max(0, $franquia);
    }

    public function consumir(float $gb): bool
    {
        if ($gb <= 0 || $this->saldo <= 0 || $gb > $this->saldo) {
            return false;
        }

        $this->saldo -= $gb;
        $this->consumoMes += $gb;

        return true;
    }

    public function comprarPacote(float $gb): bool
    {
        if ($gb <= 0) {
            return false;
        }

        $this->saldo += $gb;

        return true;
    }

    public function saldoRestante(): float
    {
        return $this->saldo;
    }

    public function totalConsumido(): float
    {
        return $this->consumoMes;
    }

    public function situacao(): string
    {
        if ($this->saldo > 0) {
            return "ativo";
        }

        return "franquia esgotada";
    }

    public function resumo(): string
    {
        return "Cliente: " . $this->cliente . PHP_EOL .
               "Saldo: " . number_format($this->saldo, 2) . " GB" . PHP_EOL .
               "Consumido no Mês: " . number_format($this->consumoMes, 2) . " GB" . PHP_EOL .
               "Situação: " . $this->situacao() . PHP_EOL;
    }
}