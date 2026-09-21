<?php 

namespace App;

use Exception;

Class TermostatoInteligente
{
    public function __construct(
        private float $celsius,
    )
    {
        if ($celsius < -273.15){
            throw new Exception("Não existem temperaturas menores que -273.15.");
        }
    }

    public function alterar(float $temperatura) : bool {
        if ($temperatura < -273.15){
            return false;
        }else {
            $this->celsius = $temperatura;
            return true;
        }

        
    }

    public function emFahrenheit() : float {
        return ($this->celsius * 9 / 5) + 32;
    }

    public function emKelvin() : float {
        return $this->celsius + 273.15;
    }

    public function descricao() : string {
        return "Celsius: " . number_format($this->celsius, 2, ".", ",") . PHP_EOL .
               "Fahrenheit: " . number_format($this->emFahrenheit(), 2, ".", ",") . PHP_EOL .
               "Kelvin: " . number_format($this->emKelvin(), 2, ".", ",") . PHP_EOL;
    }
}