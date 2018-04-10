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

True se il logger è abilitato, false se è disabilitato. Alcune funzioni tuttavia lo avranno attivo in ogni caso. Di default è true.

<hr>

`$Settings['updates']`

Array delle impostazioni riguardanti gli updates.

`$Settings['updates']['event_handler']`

Funzione strutturata così: `function($update)`. Deve avere come unico parametro `$update` che sarà l'update ricevuto. Per maggiori informazioni riguardanti l'update handling leggi [qui](updates.thml).

<hr>

`$Settings['db']`

Array delle impostazioni riguardati a `\neneone\getUpdates\Wrappers\serializedDatabase.php`. Per maggiori informazioni (se lo vuoi usare leggi poiché è importante) leggi [qui](database.html).

`$Settings['db']['serialization_interval']`

[Int](http://php.net/manual/en/language.types.integer.php) che corrisponde ai secondi ogni quali il database verrà serializzato se l'update fetching è fatto tramite la funzione `loopUpdates()`.

`$Settings['db']['default_path']`

Path di default in cui serializzare / deserializzare il database. Se è vuota e non viene passata alcuna path, il default è `db.getUpdates`.

<hr>

`$Settings['plugins']`

Array dei plugins da attivare. Ogni plugin è il nome di una classe o una classe (esempio: `$Settings['plugins'] = ['\neneone\getUpdates\Plugins\backgroundScreen];`).
