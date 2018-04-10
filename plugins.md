# Plugins

getUpdates dispone di un sistema di Plugins per cui ogni plugin presente in `$getUpdatesBot->settings['plugins']` viene avviato e si può trovare in `$getUpdatesBot->plugins['NomePlugin']`.
Esistono plugins preinstallati e si trovano in `src/neneone/getUpdates/Plugins`.

## Creare un Plugin

Per creare un plugin è sufficiente creare una classe e aggiungere il plugin in questo modo:
```php
$Settings = [
  'token' => 'Token',
  'plugins' => [
    'TuoPlugin'
  ]
];
$getUpdatesBot = new \neneone\getUpdates\getUpdates($Settings);
```

## Plugin preinstallati

Ecco la lista dei plugin preinstallati e come usarli:

- [`\neneone\getUpdates\Plugins\backgroundScreen`](Plugins/backgroundScreen.html)
