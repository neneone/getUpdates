# Installazione

Per installare getUpdatesBot ci sono tre modi, ordinati dal più comodo al meno comodo:

- Puoi usare composer, quindi includendo `neneone/getupdates` nel tuo composer.json oppure usando

```bash
$ composer require neneone/getupdates
```

- Puoi usare git per l'installazione e composer per solo per l'autoloading:

```bash
`$ git clone https://github.com/Neneone/getUpdates && cd getUpdates && composer update && composer dump-autoload`
```

- Puoi scaricare manualmente i files e caricarli sul server, poi usare l'autoload di composer in ogni caso.
