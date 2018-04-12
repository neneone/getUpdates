<?php

namespace neneone\getUpdates\Wrappers;

trait loopUpdates {
public function loopUpdates($fork = false)
    {
        $offset = 0;
        $time = time();
        \neneone\getUpdates\Logger::log('Starting updates loop...');
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
