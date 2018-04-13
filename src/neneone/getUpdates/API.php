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

class API
{
    public function __construct($token, $endpoint = 'https://api.telegram.org/')
    {
        $this->token = $token;
        $this->endPoint = $endpoint;
    }

    public function botAPI($method, $args = [])
    {
        $cURL = curl_init();
        $cURL_options = [
    CURLOPT_URL            => $this->endPoint.'bot'.$this->token.'/'.$method,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($args),
    CURLOPT_RETURNTRANSFER => true,
  ];
        curl_setopt_array($cURL, $cURL_options);
        $result = curl_exec($cURL);
        curl_close($cURL);

        return json_decode($result, true);
    }

    public function sendMessage($chat_id, $text, $parse_mode = 'HTML', $reply_markup = false, $inline = true)
    {
        $Data = [
      'chat_id'    => $chat_id,
      'text'       => $text,
      'parse_mode' => $parse_mode,
    ];
        if (isset($reply_markup) && false === empty($reply_markup)) {
            if (true == $inline) {
                $Data['reply_markup'] = [
          'inline_keyboard' => $reply_markup,
        ];
            } else {
                $Data['reply_markup'] = [
          'keyboard'        => $reply_markup,
          'resize_keyboard' => true,
        ];
            }
            $Data['reply_markup'] = json_encode($Data['reply_markup']);
            if (true === empty($Data['reply_markup'])) {
                $Data['reply_markup'] = false;
            }
        }

        return $this->botAPI(__FUNCTION__, $Data);
    }
}
