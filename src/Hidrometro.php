<?php

namespace App;

use Exception;

class Hidrometro
{
    private float $leituraAnterior;

    public function __construct(
        public string $identificacao,
        private float $leituraAtual
    )
    {
        if (empty($identificacao)){
            throw new Exception("A identificação está vazia.");
        }

        $this->leituraAnterior = $this->leituraAtual;
    }

    public function registrarLeitura(float $novaLeitura) : bool {
        if ($novaLeitura < $this->leituraAtual){
            return false;
        }

        $this->leituraAnterior = $this->leituraAtual;
        $this->leituraAtual = $novaLeitura;
        return true;
    }

    public function consumoUltimoPeriodo() : float {
        return $this->leituraAtual - $this->leituraAnterior;
    }
 
    public function estimarConta(float $precoPorM3) : float{
        return $this->consumoUltimoPeriodo() * $precoPorM3;
    }

    public function resumo() : string{
        return "Identificação: " . $this->identificacao . PHP_EOL .
               "Leitura Atual: " . $this->leituraAtual . PHP_EOL .
               "Leitura Anterior: " . $this->leituraAnterior . PHP_EOL .
               "Consumo Ultimo Periodo: " . $this->consumoUltimoPeriodo() . PHP_EOL;
    }




}