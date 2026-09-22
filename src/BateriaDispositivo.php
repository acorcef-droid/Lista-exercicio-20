<?php 

namespace App;

use Exception;

class BateriaDispositivo
{
    private int $carga;

    public function __construct(

        public string $dispositivo,
        
    )
    {
        $this->carga = 0;
    }

    public function limitador(int $valor) : int {
        if($valor > 100){
            return 100;
        }
        if ($valor < 0){
            return 0;
        }

        return $valor;
    }

    public function usar(int $minutos) : bool {
        if ($minutos <= 0){
            return false;
        }

        $porcentual = ceil($minutos / 5);

        if($this->carga >= $porcentual){
            $this->carga = $this->limitador($this->carga - $porcentual);
            return true;
        }

        return false;

    }

    public function carregar(int $percentual) : int {
        if ($percentual <= 0){
            return false;
        }

        $this->carga = $this->limitador($this->carga + $percentual);

        return $percentual;
    }

    public function nivel() : int {
        return $this->carga;
    }

    public function estaCritica() : bool {
        if ($this->carga <= 15){
            return true;
        }

        return false;
    }

    public function status() : string {
        return "Dispositivo: " . $this->dispositivo . PHP_EOL .
               "Bateria: " . $this->carga . "/100" . PHP_EOL;
    }
}