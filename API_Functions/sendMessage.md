# Metodo API: sendMessage

Invia un messaggio.

### Link alle API: [https://core.telegram.org/bots/api#sendmessage](https://core.telegram.org/bots/api#sendmessage)

## Parametri

| Nome | Tipo | Richiesto | Descrizione |
|------|------|-----------|-------------|
|chat_id|Int|Si|La chat in cui inviare il messaggio.|
|text|String|Si|Il testo da inviare.|
|parse_mode|String|No|La formattazione da usare. Può essere `HTML`, `Markdown` o `false` per nessuna formattazione. Di default è `HTML`.|
|reply_markup|Array|No|Il reply markup da usare per il messaggio. Specificare il tipo nel parametro `inline`.|
|inline|Bool|No|Scegliere se inviare una `inline_keyboard` o una `keyboard`, gli unici due tipi di tastiera supportati con questa funzione. `true` se inline, `false` se non inline.
