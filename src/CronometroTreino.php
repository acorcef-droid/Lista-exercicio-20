<?php 

namespace App;

use Exception;

class CronometroTreino
{
    private int $segundosAcumulados;

    public function __construct(
        public string $atividade,
    )
    {
        if (empty($atividade)){
            throw new Exception("A atividade não pode ser vazia.");
        }

        $this->segundosAcumulados = 0;
    }

    public function adicionarTempo(int $segundos) : bool {

        if ($segundos > 0) {
            $this->segundosAcumulados += $segundos;
            return true;
        }

        return false;
    }

    public function zerar() : void {

        $this->segundosAcumulados = 0;

    }

    public function totalMinutos() : float {
        if ($this->segundosAcumulados < 60) {
            throw new Exception("Ainda não tem um minuto acumulado.");
        }

        return $this->segundosAcumulados / 60;
    }

    public function formatarTempo() : string {
        $horas = intdiv($this->segundosAcumulados, 3600);
        $minutos = intdiv($this->segundosAcumulados % 3600, 60);
        $segundos = $this->segundosAcumulados % 60;

        return $horas . ":" . $minutos . ":" . $segundos;
    }
}