# Metodo Database: getDatabase

Deserializza il database e aggiorna `$getUpdatesBot->db`.

### Parametri:

| Nome | Tipo | Richiesto | Descrizione |
|------|------|-----------|-------------|
|path|String|Opzionale|La path da cui deserializzare il database. Di default è `db.getUpdates`.|

### Esempio:

```php
$getUpdatesBot->getDatabase('myDatabase.getUpdates');
```
