<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\TicketEstacionamento;

 

//40 minutos de permanência
$ticket1 = new TicketEstacionamento("ABC-1234", 480, 10);
$ticket1->registrarSaida(480 + 40); 
echo $ticket1->resumo() . PHP_EOL;

//60 minutos de permanência
$ticket2 = new TicketEstacionamento("DEF-5678", 480, 10);
$ticket2->registrarSaida(480 + 60); 
echo $ticket2->resumo() . PHP_EOL;

//125 minutos de permanência
$ticket3 = new TicketEstacionamento("GHI-9012", 480, 10);
$ticket3->registrarSaida(480 + 125); 
echo $ticket3->resumo() . PHP_EOL;
