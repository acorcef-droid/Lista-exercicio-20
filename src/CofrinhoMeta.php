<?php

namespace App;

use Exception;

class CofrinhoMeta
{
    public function __construct(
        public string $objetivo,
        private float $saldo,
        private float $meta
    )
    {
        if ($meta < 0){
            throw new Exception("O valor deve ser positivo e maior que 0.");
        }
        if ($saldo < 0){
            throw new Exception("O valor deve ser positivo e maior que 0.");
        }

    }
    public function validar(float $valor) : bool {
        if ($valor < 0){
            return false;
        } else {
            return true;
        }
    }

    public function depositar(float $valor) : bool {

        if (!$this->validar($valor)) {
            return false;
        }

        $this->saldo += $valor;

        return true;
    }

    public function retirar(float $valor) : bool {

        if (!$this->validar($valor)) {
            return false;
        }
        if ($valor > $this->saldo){
            return false;
        }
        
        $this->saldo -= $valor;

        return true;
    }

    public function percentualDaMeta() : float {
        return (($this->saldo / $this->meta) * 100);
    }

    public function metaAtingida() : bool {
        if ($this->percentualDaMeta() >= 100){
            return true;
        }else {
            return false;
        }
    }

    public function resumo() : string {
        return "Objetivo: " . $this->objetivo . PHP_EOL .
               "Saldo: R$" . $this->saldo . PHP_EOL . 
               "Meta: R$" . $this->meta . PHP_EOL .
               "Progresso: " . $this->saldo . "/" . $this->meta . "(" . number_format($this->percentualDaMeta(), 2, ",", ".") . "%)";
    }


}