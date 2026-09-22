<?php

namespace App;

use Exception;

class Semaforo
{
    private string $cor;
    private int $ciclosCompletos;
    
    public function __construct(
        public string $local,
    ){
        if (empty($local)){
            throw new Exception("O local n pode ser vazio.");
        }

        $this->cor = "Vermelho";
        $this->ciclosCompletos = 0;
    }

    public function avancar() : void {
        if ($this->cor == "Vermelho"){
            $this->cor = "Amarelo";
        } elseif ($this->cor == "Amarelo"){
            $this->cor = "Verde";
        } else {
            $this->cor = "Vermelho";
            $this->ciclosCompletos += 1;
        }
    }

    public function podePassar() : bool {
        if ($this->cor == "Verde"){
            return true;
        }else{
            return false;
        }
    }

    public function estado() : string {
        return "Local: " . $this->local . PHP_EOL .
               "Cor Atual: " . $this->cor . PHP_EOL .
               "Pode Passar: " . ($this->podePassar() ? "Sim" : "Não") . PHP_EOL .
               "Ciclos Completos: " . $this->ciclosCompletos . PHP_EOL;
    }
}