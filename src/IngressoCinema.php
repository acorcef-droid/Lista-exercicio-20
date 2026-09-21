<?php

namespace App;

use Exception;

Class IngressoCinema    
{
    private bool $meiaEntrada = false;  

    public function __construct(
        public string $filme,
        private float $precoBase,
    )
    {
        if (empty($filme)){
            throw new Exception("O filme não pode ser vazio.");
        }
        if ($precoBase < 0){
            throw new Exception("O preço base deve ser positivo.");
        }
    }

    public function  definirMeiaEntrada(bool $possuiDireito) : void {
        if ($possuiDireito){
            $this->meiaEntrada = true;
        }else {
            $this->meiaEntrada = false;
        }
    }

    public function calcularValorFinal() : float {
        if ($this->meiaEntrada){
            return $this->precoBase * 0.5;
        }else {
            return $this->precoBase;
        }
    }

    public function resumo() : string {
        return "Filme: " . $this->filme . PHP_EOL .
               "Ingresso: " . number_format($this->precoBase, 2, ",", ".") . PHP_EOL .
               "Meia: " . ($this->meiaEntrada ? "Sim" : "Não") . PHP_EOL .
               "Valor Final: " . number_format($this->calcularValorFinal(), 2, ",", ".") . PHP_EOL;
    }

}