# Metodo Database: addDatabase

Aggiunge un dato al database.

### Parametri:

| Nome | Tipo | Richiesto | Descrizione |
|------|------|-----------|-------------|
|value|Qualsiasi|Si|Il valore da impostare. Default: ''|
|user|Int / String|Si|L'utente a cui settare il dato nel Database.|
|page|Int / String|No|Default: 'page'. La "colonna" da settare.|
|serialize|Bool|No|Default è false. Serializzare il database dopo aver aggiunto il dato?|

### Esempio:

```php
$getUpdatesBot->addDatabase('Inviando', $userID, 'page', false);
```
