<?php

require_once __DIR__.'/vendor/autoload.php';

$Settings = [
  'token' => '523209487:AAEtYvbeFiGJ2g-2I76c0c1y6EC5NiKW_YQ', // Inserire il token del bot
];

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings); // Inizializzare la classe

while(true) { // Bisogna verificare per sempre se ci sono nuovi updates
  while($update = $getUpdates->API->getUpdate()) { // Questa funzione restituisce solo un'update, il primo preso. Ogni volta che viene chiamata restituisce il successivo.
    $chatID = $update['message']['chat']['id'];
    $getUpdatesBot->API->sendMessage($chatID, 'Ciao!');
  }
}

 ?>
