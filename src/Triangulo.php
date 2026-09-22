<?php

namespace App;

use Exception;

class Triangulo
{
    public function __construct(
        private float $ladoA,
        private float $ladoB,
        private float $ladoC,
    ){
        if ($ladoA <= 0 || $ladoB <= 0 || $ladoC <= 0) {
            throw new Exception("Os lados do triângulo devem ser valores positivos.");
        }
    }

    public function ehValido() : bool {
        return ($this->ladoA + $this->ladoB > $this->ladoC) &&
               ($this->ladoA + $this->ladoC > $this->ladoB) &&
               ($this->ladoB + $this->ladoC > $this->ladoA);
    }

    public function classificar() : string {
        if(!$this->ehValido()){
            return "Inválido.";
        }else{
            if ($this->ladoA == $this->ladoB && $this->ladoB == $this->ladoC){
                return "Equilátero";
            }elseif($this->ladoA == $this->ladoB || $this->ladoA == $this->ladoC || $this->ladoB == $this->ladoC){
                return "Isósceles";
            }else{
                return "Escaleno";
            }
        }
    }
    
    public function perimetro() : float {
        if ($this->ehValido()){
            return $this->ladoA + $this->ladoB + $this->ladoC;
        }else{
            throw new Exception("Não há perimetro para triangulo inválido.");
        }
    }
}