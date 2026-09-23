<?php

namespace App;

use Exception;

class CompartimentoLocker
{
    private string $estado = "livre";
    private ?string $idEncomenda = null;
    private ?string $codigoRetirada = null;
    private int $errosConsecutivos = 0;

    public function __construct(public int $numero)
    {
        if ($numero <= 0) {
            throw new Exception("Número inválido.");
        }
    }

    public function depositar(string $idEncomenda, string $codigo): bool
    {
        if ($this->estado !== "livre" || empty($idEncomenda)) {
            return false;
        }

        if (!ctype_digit($codigo) || strlen($codigo) < 4 || strlen($codigo) > 6) {
            return false;
        }

        $this->idEncomenda = $idEncomenda;
        $this->codigoRetirada = $codigo;
        $this->errosConsecutivos = 0;
        $this->estado = "ocupado";

        return true;
    }

    public function retirar(string $codigo): bool
    {
        if ($this->estado !== "ocupado") {
            return false;
        }

        if ($codigo === $this->codigoRetirada) {
            $this->idEncomenda = null;
            $this->codigoRetirada = null;
            $this->errosConsecutivos = 0;
            $this->estado = "livre";

            return true;
        }

        $this->errosConsecutivos++;

        if ($this->errosConsecutivos >= 3) {
            $this->estado = "bloqueado";
        }

        return false;
    }

    public function redefinirBloqueio(): bool
    {
        if ($this->estado !== "bloqueado") {
            return false;
        }

        $this->errosConsecutivos = 0;
        $this->estado = "ocupado";

        return true;
    }

    public function tentativasRestantes(): int
    {
        if ($this->estado !== "ocupado") {
            return 0;
        }

        return 3 - $this->errosConsecutivos;
    }

    public function situacao(): string
    {
        return "Compartimento: " . $this->numero . PHP_EOL .
               "Estado: " . $this->estado . PHP_EOL .
               "Encomenda: " . ($this->idEncomenda ?? "Nenhuma") . PHP_EOL .
               "Tentativas restantes: " . $this->tentativasRestantes() . PHP_EOL;
    }
}