# Gestire le Impostazioni

```php
$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);
```

`$Settings` è un [array](http://php.net/manual/en/book.array.php) che contiene le varie impostazioni, che ora vedremo come creare. Lo puoi modificare accedendo a `$getUpdatesBot->settings;`.

<hr>

`$Settings['token']`

Contiene il token del Bot.

<hr>

`$Settings['logger']`

Array delle impostazioni riguardanti il logger.

`$Settings['logger']['logger']`

La modalità del logger. Può essere `1` se è attivato, `0` se è disattivato. Di default è `1`.

`$Settings['logger']['logger_level']`

Il livello minimo del logger da utilizzare (per esempio se imposti WARNING e viene loggato qualcosa di livello NOTICE, non verrà stampato). I possibili livelli sono:

- `\neneone\getUpdates\Logger::VERBOSE`
- `\neneone\getUpdates\Logger::NOTICE`,
- `\neneone\getUpdates\Logger::WARNING`,
- `\neneone\getUpdates\Logger::ERROR`,
- `\neneone\getUpdates\Logger::FATAL_ERROR`

<hr>

`$Settings['updates']`

Array delle impostazioni riguardanti gli updates.

`$Settings['updates']['event_handler']`

Funzione strutturata così: `function($update)`. Deve avere come unico parametro `$update` che sarà l'update ricevuto. Per maggiori informazioni riguardanti l'update handling leggi [qui](updates.html).

<hr>

`$Settings['db']`

Array delle impostazioni riguardati a `\neneone\getUpdates\Wrappers\serializedDatabase.php`. Per maggiori informazioni (se lo vuoi usare leggi poiché è importante) leggi [qui](database.html).

`$Settings['db']['serialization_interval']`

[Int](http://php.net/manual/en/language.types.integer.php) che corrisponde ai secondi ogni quali il database verrà serializzato se l'update fetching è fatto tramite la funzione `loopUpdates()`.

`$Settings['db']['default_path']`

Path di default in cui serializzare / deserializzare il database. Se è vuota e non viene passata alcuna path, il default è `db.getUpdates`.

<hr>

`$Settings['plugins']`

Array dei plugins da attivare. Ogni plugin è il nome di una classe o una classe (esempio: `$Settings['plugins'] = ['\neneone\getUpdates\Plugins\backgroundScreen'];`).

<hr>

`$Settings['endpoint']`

L'endpoint da usare per fare le richieste. Di default è `https://api.telegram.org/`. Si può modificare anche da `$getUpdatesBot->API->endPoint` e `$getUpdatesBot->botAPI->endPoint` oppure con `$getUpdatesBot->setEndpoint($new_endpoint);`.
