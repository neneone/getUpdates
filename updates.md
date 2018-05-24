# Gestire gli Updates

## Con funzione di Callback

```php
$eventHandler = function ($update) {
    \neneone\getUpdates\Logger::log('Ho ricevuto un update (il numero ' . $update['update_id'] . ').', \neneone\getUpdates\Logger::IMPORTANCE_LOW);
};

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);
$getUpdatesBot->setEventHandler($eventHandler);
$getUpdatesBot->loopUpdates();
```

Questo codice crea la funzione eventHandler che è in `$eventHandler`, lo imposta tramite `setEventHandler()` (si può anche includere nelle impostazioni) e inizia il loop tramite `loopUpdates()`. La funzione dell'eventHandler viene chiamata ad ogni update e deve avere come parametri un solo parametro, `$update`, che contiene l'update ricevuto. Per usare `$getUpdatesBot` sarà necessario usare `$GLOBALS['getUpdatesBot']` oppure scrivere all'inizio della funzione `global $getUpdatesBot;`.

### Con multithread

```php
$eventHandler = function ($update) {
    \neneone\getUpdates\Logger::log('Ho ricevuto un update (il numero ' . $update['update_id'] . ').', \neneone\getUpdates\Logger::IMPORTANCE_LOW);
};

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);
$getUpdatesBot->setEventHandler($eventHandler);
$getUpdatesBot->loopUpdates(true);
```

Questo codice è uguale al precedente ma usa `loopUpdates(true)`, ovvero abilita il multithread (ogni update avrà un proprio thread).

## Semi-automatico

In questa libreria è presente un sistema per creare un sistema di getUpdates quasi automatico, che però permette di evitare i vincoli che ha il codice che viene eseguito all'interno delle funzioni di PHP. Gli sconvenienti sono però che le funzioni che vengono eseguite durante `loopUpdates()` non verranno eseguite se non manualmente.


```php
<?php

$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);

while (true) {
  while ($update = $getUpdates->API->getUpdates()) {
    $chatID = $update['message']['chat']['id'];
      $getUpdatesBot->API->sendMessage($chatID, 'Ciao!');
  }
}
```

Questo codice definisce `$getUpdates`, poi usando `getUpdates()` ma di `$getUpdates->API` e non di `$getUpdates->botAPI`, prende solo il più vecchio update ricevuto (in modo da eseguire in ordine cronologico) e lo ritorna, poi passa al prossimo e così via, in modo che l'utente non si debba preoccupare del gestire correttamente i `foreach`, lo skip dell'offset ecc.

La funzione ritorna sempre un update nell'ordine sopra indicato, ma nel caso in cui non ci fossero ritornerà `false`, ed è quindi opportuno usare due cicli `while` in modo da rendere il fetching costante.

## Manuale

```php
$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);

while (true) {
    $updates = $getUpdatesBot->botAPI->getUpdates(['offset' => $offset]);
    foreach ($updates['result'] as $key => $value) {
        $update = $updates['result'][$key];
        $offset = $update['update_id'] + 1;
        \neneone\getUpdates\Logger::log('Ho ricevuto un update (il numero ' . $update['update_id'] . ').', \neneone\getUpdates\Logger::IMPORTANCE_LOW);
    }
}
```

Questo codice definisce `$getUpdatesBot`, poi tramite la funzione `getUpdates()` prende gli updates e per ogni update esegue l'azione dovuta (in questo caso loggare l'update che ha ricevuto).
