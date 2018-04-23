<?php

/*
 * Copyright (C) 2018 Enea Dolcini
 * This file is part of getUpdates.
 * getUpdates is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * getUpdates is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU  Affero General Public License
 * along with getUpdates.  If not, see http://www.gnu.org/licenses.
 *
 */

namespace neneone\getUpdates;

class getUpdates
{
    use \neneone\getUpdates\Wrappers\serializedDatabase;
    use \neneone\getUpdates\Wrappers\loopUpdates;
    use \neneone\getUpdates\Wrappers\loadUpdate;

    public function __construct($settings)
    {
        $this->settingsScheme = [
      'token'  => true,
      'endpoint' => [
        'default' => 'https://api.telegram.org/',
      ],
    ];

        if(isset($settings['logger']) === false) {
          $settings['logger'] = [
            'logger' => 1,
            'logger_level' => \neneone\getUpdates\Logger::VERBOSE
          ];
        } else {
          if(isset($settings['logger']['logger']) === false) $settings['logger']['logger'] = 1; else {
            switch($settings['logger']['logger']) {
              case 0:
              break;
              case 1:
              break;
              default:
              \neneone\getUpdates\Logger::logger('Modalità del logger non valida, ha assunto il valore di 1.', \neneone\getUpdates\Logger::ERROR);
              break;
            }
          }
          if(isset($settings['logger']['logger_level']) === false) $settings['logger']['logger_level'] = \neneone\getUpdates\Logger::VERBOSE; else {
            switch($settings['logger']['logger']) {
              case \neneone\getUpdates\Logger::VERBOSE:
              break;
              case \neneone\getUpdates\Logger::NOTICE:
              break;
              case \neneone\getUpdates\Logger::WARNING:
              break;
              case \neneone\getUpdates\Logger::ERROR:
              break;
              case \neneone\getUpdates\Logger::FATAL_ERROR:
              break;
              default:
              \neneone\getUpdates\Logger::logger('Livello del logger non valido, ha assunto il valore di \neneone\getUpdates\Logger::VERBOSE.', \neneone\getUpdates\Logger::ERROR);
              break;
            }
          }
        }
        \neneone\getUpdates\Logger::__static_construct($settings['logger']['logger'], $settings['logger']['logger_level']);
        $this->buildSettings($settings);
        $this->botAPI = new botAPI($this->settings['token']);
        $this->API = new API($this->botAPI->token);
        if (false === isset($this->settings['db']['unserialize_db_on_startup'])) {
            $this->settings['db']['unserialize_db_on_startup'] = true;
            \neneone\getUpdates\Logger::log('Non hai fornito l\'impostazione db.unserialize_db_on_startup che ha assunto il valore di true', \neneone\getUpdates\Logger::WARNING);
        }
        if ($this->settings['db']['unserialize_db_on_startup'] == true) {
            $this->getDatabase();
        }
        if (isset($this->settings['plugins']) && is_array($this->settings['plugins'])) {
            foreach ($this->settings['plugins'] as $Plugin) {
                if (class_exists($Plugin)) {
                    $this->plugins[$Plugin] = new $Plugin($this->settings);
                }
            }
        }
        \neneone\getUpdates\Logger::log('getUpdatesBot inizializzato correttamente.', \neneone\getUpdates\Logger::NOTICE);
    }

    private function buildSettings($settings, $settingsScheme = 0)
    {
        if (0 == $settingsScheme) {
            $settingsScheme = $this->settingsScheme;
        }
        foreach ($settingsScheme as $setting => $required) {
            if (true === $required && false == isset($settings[$setting])) {
                throw new \neneone\getUpdates\Exception('Devi fornire l\'impostazione '.$setting.'!');
            } elseif (false == isset($settings[$setting]) && isset($settingsScheme[$setting]['default'])) {
                $settings[$setting] = $settingsScheme[$setting]['default'];
                \neneone\getUpdates\Logger::log('Non hai fornito l\'impostazione '.$setting.' che ha assunto il valore di '.$settingsScheme[$setting]['default'], \neneone\getUpdates\Logger::WARNING);
            }
        }
        $this->settings = $settings;
    }

    public function setEventHandler($function)
    {
        if (is_callable($function)) {
            $this->settings['updates']['event_handler'] = $function;
        } else {
            throw new \neneone\getUpdates\Exception('L\'EventHandler deve essere una funzione valida!');
        }
    }

    public function setEndpoint($endpoint)
    {
        $this->API->endPoint = $endpoint;
        $this->botAPI->endPoint = $endpoint;
    }
}
