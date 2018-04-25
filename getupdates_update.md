# Aggiornare getUpdates

Per aggiornare getUpdates c'è un Wrapper (`\neneone\getUpdates\Wrappers\loadUpdate`) che permette di aggiornare facilmente il bot **tramite `git` o `composer`**. Sceglie automaticamente quale usare.

Ecco come:

```php
$botUpdate = $getUpdatesBot->loadUpdate();
```

In questo esempio `$botUpdate` conterrà il valore ritornato dall'aggiornamento.
