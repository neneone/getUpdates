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

namespace neneone\getUpdates\Wrappers;

trait loopUpdates
{
    public function loopUpdates($fork = false)
    {
        $offset = 0;
        $time = time();
        \neneone\getUpdates\Logger::log('Starting updates loop...', \neneone\getUpdates\Logger::NOTICE);
        if (true == $fork) {
            while (true) {
                $updates = $this->botAPI->getUpdates(['offset' => $offset]);
                if (isset($this->settings['db']['serialization_interval'])) {
                    if ($time + $this->settings['db']['serialization_interval'] <= time()) {
                        $time = time();
                        $this->serializeDatabase();
                    }
                }
                foreach ($updates['result'] as $key => $value) {
                    $update = $updates['result'][$key];
                    $offset = $update['update_id'] + 1;
                    if (!pcntl_fork()) {
                        $this->settings['updates']['event_handler']($update);
                        exit;
                    }
                }
                $offset = (count($updates['result']) - 1) > 0 ? $updates['result'][count($updates['result']) - 1]['update_id'] + 1 : $offset;
            }
        } else {
            while (true) {
                $updates = $this->botAPI->getUpdates(['offset' => $offset]);
                if (isset($this->settings['db']['serialization_interval'])) {
                    if ($time + $this->settings['db']['serialization_interval'] <= time()) {
                        $time = time();
                        $this->serializeDatabase();
                    }
                }
                foreach ($updates['result'] as $key => $value) {
                    $update = $updates['result'][$key];
                    $offset = $update['update_id'] + 1;
                    $this->settings['updates']['event_handler']($update);
                }
                $offset = (count($updates['result']) - 1) > 0 ? $updates['result'][count($updates['result']) - 1]['update_id'] + 1 : $offset;
            }
        }
    }
}
