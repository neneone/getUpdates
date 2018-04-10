# Database 

getUpdates possiede già un Database interno che per l'utilizzo al momento viene conservato nella RAM ma può anche essere serializzato. Tutto questo grazie a `\neneone\getUpdates\Wrappers\serializedDatabase`.

Per accedere al database si può usare `$getUpdatesBot->returnDB();` oppure `$getUpdatesBot->db`.

Questo Database **non può essere usato con `loopUpdates(true)`, ovvero con il multithread**.

## Funzioni

- [`serializeDatabase()`](databaseFunctions/serializeDatabase.html)
- [`getDatabase()`](databaseFunctions/getDatabase.html)
- [`addDatabase()`](databaseFunctions/addDatabase.html)
- [`returnDB()`](databaseFunctions/returnDB.html)
