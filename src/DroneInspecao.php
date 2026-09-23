<?php

namespace App;

use Exception;

class DroneInspecao
{
    private int $bateria;
    private float $distanciaTotal = 0;
    private bool $emVoo = false;

    public function __construct(
        public string $modelo,
        int $bateria = 100
    )
    {
        if (empty($modelo)){
            throw new Exception("O modelo está vazio.");
        }

        $this->bateria = max(0, min(100, $bateria));
    }

    public function decolar() : bool {
        if ($this->emVoo || $this->bateria < 20){
            return false;
        }

        $this->emVoo = true;
        return true;
    }

    public function voar(float $km) : bool {
        if (!$this->emVoo || $km <= 0){
            return false;
        }

        $consumo = (int) ceil(round($km * 5, 6));

        if ($consumo > $this->bateria){
            $this->distanciaTotal += $this->bateria / 5;
            $this->bateria = 0;
            return false;
        }

        $this->bateria -= $consumo;
        $this->distanciaTotal += $km;
        return true;
    }

    public function pousar() : bool {
        if (!$this->emVoo){
            return false;
        }

        $this->emVoo = false;
        return true;
    }

    public function recarregar(int $percentual) : int {
        if ($percentual > 0){
            $this->bateria = min(100, $this->bateria + $percentual);
        }

        return $this->bateria;
    }

    public function status() : string {
        return "Modelo: " . $this->modelo . PHP_EOL .
               "Bateria: " . $this->bateria . "%" . PHP_EOL .
               "Distância Total: " . number_format($this->distanciaTotal, 1) . " km" . PHP_EOL .
               "Situação: " . ($this->emVoo ? "em voo" : "em solo") . PHP_EOL;
    }
}
