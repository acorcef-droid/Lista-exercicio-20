<?php

namespace App;

use Exception;

Class Retangulo
{
    public function __construct(
        private float $largura,
        private float $altura,
    )
    {
        if ($largura < 0){
            throw new Exception("As dimensoes devem ser maior que 0.");
        }
        if ($altura < 0){
            throw new Exception("As dimensoes devem ser maior que 0.");
        }
    }

    public function area() : float {
        return $this->largura * $this->altura;;
    }

    public function perimetro() : float {
        return 2 * ($this->largura * $this->altura);
    }

    public function ehQuadrado() : bool {
        if ($this->altura == $this->largura){
            return true;
        }else {
            return false;
        }
    }
}