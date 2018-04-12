<?php

/*
 * Copyright (C) 2018 Enea Dolcini
 *           This file is part of getUpdates.
 *           getUpdates is free software: you can redistribute it and/or modify
 *           it under the terms of the GNU Affero General Public License as published by
 *           the Free Software Foundation, either version 3 of the License, or
 *           (at your option) any later version.
 *           getUpdates is distributed in the hope that it will be useful,
 *           but WITHOUT ANY WARRANTY; without even the implied warranty of
 *           MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *           GNU Affero General Public License for more details.
 *           You should have received a copy of the GNU  Affero General Public License
 *           along with getUpdates.  If not, see http://www.gnu.org/licenses.
 *
 */

require_once __DIR__.'/vendor/autoload.php';

// Con questo file per avviare in background bisognerà usare: php backgroundStart.php background

// La funzione eventHandler($update) sarà chiamata ad ogni update ricevuto

function eventHandler($update)
{
    global $getUpdatesBot;
    $chatID = $update['message']['chat']['id'];
    $getUpdatesBot->API->sendMessage($chatID, 'Ciao!');
}

$Settings = [
  'token'   => '523209487:AAEtYvbeFiGJ2g-2I76c0c1y6EC5NiKW_YQ', // Inserire il token del bot
  'plugins' => [
    '\neneone\getUpdates\Plugins\backgroundScreen',
  ],
];

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings); // Inizializzare la classe

if (isset($argv[1]) && 'background' == $argv[1]) {
    $getUpdatesBot->plugins['\neneone\getUpdates\Plugins\backgroundScreen']->backgroundStart(__FILE__);
    die;
}

$getUpdatesBot->setEventHandler('eventHandler'); // Inserire il nome della funzione o la funzione dell'eventHandler

$getUpdatesBot->loopUpdates(); // Inserire true (ovvero loopUpdates(true)) per abilitare il multiprocessing
