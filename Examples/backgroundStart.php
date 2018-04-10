<?php

require_once __DIR__ . '/vendor/autoload.php';

# Con questo file per avviare in background bisognerà usare: php backgroundStart.php background

# La funzione eventHandler($update) sarà chiamata ad ogni update ricevuto

function eventHandler($update) {
  global $getUpdatesBot;
  $chatID = $update['message']['chat']['id'];
  $getUpdatesBot->API->sendMessage($chatID, 'Ciao!');
}

$Settings = [
  'token' => '523209487:AAEtYvbeFiGJ2g-2I76c0c1y6EC5NiKW_YQ', # Inserire il token del bot
  'plugins' => [
    '\neneone\getUpdates\Plugins\backgroundScreen'
  ]
];

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings); # Inizializzare la classe

if(isset($argv[1]) && $argv[1] == 'background') {
  $getUpdatesBot->plugins['\neneone\getUpdates\Plugins\backgroundScreen']->backgroundStart(__FILE__);
  die;
}

$getUpdatesBot->setEventHandler('eventHandler'); # Inserire il nome della funzione o la funzione dell'eventHandler

$getUpdatesBot->loopUpdates(); # Inserire true (ovvero loopUpdates(true)) per abilitare il multiprocessing

 ?>
