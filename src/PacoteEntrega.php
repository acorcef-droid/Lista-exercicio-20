<?php

namespace App;

use Exception;

class PacoteEntrega
{
    private string $status = "aguardando";
    private int $tentativas = 0;

    public function __construct(
        public string $codigo,
        public string $destino
    )
    {
        if (empty($codigo)){
            throw new Exception("O código está vazio.");
        }

        if (empty($destino)){
            throw new Exception("O destino está vazio.");
        }
    }

    public function sairParaEntrega() : bool {
        if ($this->status !== "aguardando"){
            return false;
        }

        $this->tentativas += 1;
        $this->status = "em rota";
        return true;
    }

    public function registrarFalha() : bool {
        if ($this->status !== "em rota"){
            return false;
        }

        if ($this->tentativas >= 3){
            $this->status = "devolução";
        } else {
            $this->status = "aguardando";
        }

        return true;
    }

    public function confirmarEntrega() : bool {
        if ($this->status !== "em rota"){
            return false;
        }

        $this->status = "entregue";
        return true;
    }

    public function statusAtual() : string {
        return "Código: " . $this->codigo . PHP_EOL .
               "Destino: " . $this->destino . PHP_EOL .
               "Status: " . $this->status . PHP_EOL .
               "Tentativas: " . $this->tentativas . PHP_EOL;
    }
}
