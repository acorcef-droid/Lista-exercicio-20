<?php 

namespace App;

use Exception;

class MaquinaSnack
{
    private int $estoque;
    private float $credito;

    public function __construct(
        public string $produto,
        private float $preco,
    ){
        if (empty($produto)){
            throw new Exception("O produto está vazio.");
        }
        if ($preco < 0){
            throw new Exception("O preco deve ser um número positivo.");
        }
        $this->estoque = 0;
        $this->credito = 0;
    }


    public function reabastecer(int $quantidade) : bool {
        if ($quantidade < 0){
            return false;
        }

        $this->estoque += $quantidade;
        return true;
    }

    public function inserirCredito(float $valor) : bool {
        if ($valor < 0){
            return false;
        }

        $this->credito += $valor;
        return true;

    }

    public function comprar() : bool {
        if ($this->credito > $this->preco && $this->estoque > 0){
            $this->estoque -= 1;
            $this->credito -= $this->preco;
            return true;
        }

        return false;
    }

    public function devolverCredito() : float {

        $restante = $this->credito;

        $this->credito = 0;

        return $restante;


    }

    public function status() : string {
        return "Produto: " . $this->produto . PHP_EOL . 
               "Preço: " . $this->preco . PHP_EOL .
               "Estoque: " . $this->estoque . PHP_EOL .
               "Crédito: " . $this->credito . PHP_EOL;
    }
}