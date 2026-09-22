<?php

namespace App;

use Exception;

class PersonagemRPG
{
    private int $vida;
    private int $energia;

    public function __construct(
        public string $nome,
        public string $classe,
    )
    {
        if (empty($nome)){
            throw new Exception("O nome não pode estar vazio.");
        }
        if (empty($classe)){
            throw new Exception("A classe não pode estar vazio.");
        }

        $this->vida = 100;
        $this->energia = 100;
    }

    public function limitador($valor) : int {
        if ($valor > 100){
            return 100;
        }
        if ($valor < 0){
            return 0;
        }

        return $valor;
    }

    public function receberDano(int $pontos) : bool {
        if ($pontos < 0 && $pontos < 100){
            return false;
        }

        if ($this->vida > 0){
            $this->vida = $this->limitador($this->vida - $pontos);
            return true;
        }else{
            return false;
        }
    }

    public function curar(int $pontos) : bool{
        if ($pontos < 0 && $pontos < 100){
            return false;
        }

        $this->vida = $this->limitador($this->vida + $pontos);
        return true;

    }

    public function usarHabilidade(int $custoEnergia) : bool {
        if ($custoEnergia <= $this->energia && $this->vida > 0){
            $this->energia = $this->limitador($this->energia - $custoEnergia);
            return true;
        } else {
            return false;
        }
    }

    public function descansar(int $pontos) : bool {
        if ($pontos < 0 && $pontos < 100){
            return false;
        }

        $this->energia = $this->limitador($this->energia + $pontos);
        return true;
    }

    public function status() : string {
        return "Nome: " . $this->nome . PHP_EOL .
               "Classe: " . $this->classe . PHP_EOL .
               "Vida: " . $this->vida . "/100" . PHP_EOL .
               "Energia: " . $this->energia . "/100" . PHP_EOL;
    }
}