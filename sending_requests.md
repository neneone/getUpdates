# Inviare richieste

getUpdates possiede due modi per comunicare con le Bot API: puoi chiamare direttamente i metodi con i parametri che devi inserire oppure usare funzioni già fatte.

## Creare i parametri

Se desideri creare tu i parametri o non c'è la funzione già fatta ti basterà usare `$getUpdatesBot->botAPI` ed il nome del metodo (es:
```php
$sentMessage = $getUpdatesBot->botAPI->sendMessage(['chat_id' => '@channelUsername', 'text' => 'Ciao!']);
```
).

N.B.: Se desideri usare un token diverso da quello settato nelle impostazioni puoi creare un'altra istanza di `\neneone\getUpdates\botAPI` in questo modo: `$getUpdatesBot->secondBotAPI = new \neneone\getUpdates\botAPI($second_token);`.

N.B.: In `\neneone\getUpdates\botAPI` non sono inclusi i metodi che riguardano il webhook (`setWebhook`, `deleteWebhook`, `getWebhookInfo`) poiché normalmente la classe utilizza il token di un bot che sta usando getUpdates. È comunque possibile chiamarli in questo modo:
```php
$myWebhookInfos = $getUpdatesBot->botAPI->botAPI('getWebhookInfo');
```
o, per prendere le informazioni di un altro bot:
```php
$anotherWebhookInfos = (new \neneone\getUpdates\botAPI($anotherBotToken))->botAPI('getWebhookInfo');
```

## Utilizzare funzioni già fatte

Nella classe `\neneone\getUpdates\API` sono presenti funzioni già create (e ottimizzate per il metodo specifico della funzione) che possono essere molto più facilmente utilizzate usando anche la documentazione. Tuttavia queste funzioni non posso soddisfare al 100% tutte le necessità per le richieste, e si può quindi fare ricorso alla [creazione dei parametri](#creare-i-parametri)

### Funzioni già create:

- [sendMessage](API_Functions/sendMessage.html)
