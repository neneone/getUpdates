# Aggiornare getUpdates

Per aggiornare getUpdates c'è un Wrapper (`\neneone\getUpdates\Wrappers\loadUpdate`) che permette di aggiornare facilmente il bot **tramite `git`**. Ecco come:

```php
$botUpdate = $getUpdatesBot->loadUpdate();
```

In questo esempio `$botUpdate` conterrà il valore ritornato dall'aggiornamento tramite `git`.
