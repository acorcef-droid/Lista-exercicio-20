<?php

namespace App;

use Exception;
use NumberFormatter;

class TicketEstacionamento
{

    private ?int $saidaMin = null;
    
    public function __construct(
        public string $placa,
        private int $entradaMin,
        private float $tarifaHora
    )
    {
        if ($tarifaHora <= 0){
            throw new Exception("A tarifa deve ser um valor positivo.");
        }  
    }

    public function registrarSaida(int $minuto) : bool {
        if($this->saidaMin === null && $minuto > $this->entradaMin){
            $this->saidaMin = $minuto;
            return true;
        }else {
            return false;
        }
    }

    public function duracaoMin() : int {
        if ($this->saidaMin === null){
            return 0;
        } else {
            return $this->saidaMin - $this->entradaMin;
        }
    }

    public function valorAPagar() : float {
        $duracao = $this->duracaoMin();

        if ($duracao == 0){
            return 0.0;
        }else{
            $horas = ceil($duracao / 60);

            return $horas * $this->tarifaHora;
        }
    }

    public function resumo() : string {
        return "Placa: " . $this->placa . PHP_EOL . 
               "Duração: " . $this->duracaoMin() . "min" . PHP_EOL .   
               "Valor: R$" . number_format($this->valorAPagar(), 2, ",", ".") . PHP_EOL;
    }
}