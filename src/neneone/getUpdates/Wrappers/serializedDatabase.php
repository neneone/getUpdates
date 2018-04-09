<?php

/*
          Copyright (C) 2018 Enea Dolcini
          This file is part of getUpdates.
          getUpdates is free software: you can redistribute it and/or modify
          it under the terms of the GNU Affero General Public License as published by
          the Free Software Foundation, either version 3 of the License, or
          (at your option) any later version.
          getUpdates is distributed in the hope that it will be useful,
          but WITHOUT ANY WARRANTY; without even the implied warranty of
          MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
          GNU Affero General Public License for more details.
          You should have received a copy of the GNU  Affero General Public License
          along with getUpdates.  If not, see http://www.gnu.org/licenses.
*/

namespace neneone\getUpdates\Wrappers;

chdir(__DIR__ . '/../..');
define('DIR', __DIR__ . '/../..');

trait serializedDatabase
{
    public function serializeDatabase($path = 0)
    {
        if ($path == 0 or empty($path) or file_exists($path) == false) {
            if (isset($this->settings['db']['default_path']) && file_exists($this->settings['db']['default_path'])) {
                $path = $this->settings['db']['default_path'];
            } else {
                $path = DIR . '/db.getUpdates';
            }
            \neneone\getUpdates\Logger::log('Path per serializzare il database invalida, ha assunto un valore di default: ' . realpath($path), \neneone\getUpdates\Logger::IMPORTANCE_MEDIUM);
        }
        $db = serialize($this->db);
        if (empty($db)) {
            \neneone\getUpdates\Logger::log('Database vuoto... fermo la serializzazione.');
            return false;
        }
        file_put_contents($path, $db);
        return true;
    }
    public function getDatabase($path = 0)
    {
        if ($path == 0 or empty($path) or file_exists($path) == false) {
            if (isset($this->settings['db']['default_path']) && file_exists($this->settings['db']['default_path'])) {
                $path = $this->settings['db']['default_path'];
            } else {
                $path = DIR . '/db.getUpdates';
            }
            \neneone\getUpdates\Logger::log('Path per deserializzare il database invalida, ha assunto un valore di default: ' . realpath($path), \neneone\getUpdates\Logger::IMPORTANCE_MEDIUM);
        }
        if (file_exists($path)) {
            $db = unserialize(file_get_contents($path));
        } else {
            $db = [];
        }
        $this->db = $db;
        return $db;
    }
    public function addDatabase($value = '', $user, $page = 'page', $serialize = false)
    {
        $this->db[$user][$page] = $value;
        if ($serialize) {
            $this->serializeDatabase();
        }
        return $this->db[$user][$page];
    }
    public function returnDB()
    {
        return $this->db;
    }
}
