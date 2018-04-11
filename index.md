# getUpdates - PHP OOP per creare Bot Telegram

## Cos'è?

getUpdates è una PHP OOP (classe PHP) che utilizza le [BotAPI](https://core.telegram.org/bots/api) ed il metodo [getUpdates](https://core.telegram.org/bots/api#getupdates) per creare un Bot Telegram.

## Cosa mi serve?

Per poter utilizzare getUpdates ti serve un server (possibilmente VPS) con PHP 7.1 o maggiore e screen ([come installare screen](screen_install.html)).

## Utilizzo

La funzione `__construct` della classe richiede un solo parametro, `$settings`, e [qui](settings.html) puoi trovare come usarlo.

Se vuoi vedere degli esempi puoi guardare la directory degli esempi [qui](https://github.com/Neneone/getUpdates/tree/master/Examples).

## Features

- Il bot recupera gli update precedenti a cui non ha risposto (presto opzionale).
- Grazie al plugin `\neneone\getUpdates\Plugins\backgroundScreen` può funzionare anche in background.
- Il tutto si può aggiornare da Terminale se installato tramite `git` o `composer`.

## Docs

- [Installazione](installation.html)
- [Come gestire le impostazioni](settings.html)
- [Gestire gli Updates](updates.html)
  - [Con funzione di CallBack](updates.md#con-funzione-di-callback)
    - [Con anche Multithread](updates.md#con-multithread)
  - [Manualmente](updates.md#manuale)
- [Inviare richieste](sending_requests.html)
- [Gestire il Database](database.html)
- [Gestire i Plugins](plugins.html)
