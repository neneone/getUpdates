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
