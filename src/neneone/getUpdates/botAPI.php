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

namespace neneone\getUpdates;

class botAPI implements botAPIScheme
{
    public function __construct($token)
    {
        $this->buildToken($token);
    }

    private function buildToken($token)
    {
        $this->token = $token;
        $getMe = $this->getMe();
        if ($getMe['ok'] == true) {
            $this->getMe = $getMe['result'];
        } else {
            unset($this->token);

            throw new \neneone\getUpdates\Exception('Token non valido!');
        }
    }

    public function botAPI($method, $args = [])
    {
        $cURL = curl_init();
        $cURL_options = [
      CURLOPT_URL            => 'https://api.telegram.org/bot'.$this->token.'/'.$method,
      CURLOPT_POST           => true,
      CURLOPT_POSTFIELDS     => http_build_query($args),
      CURLOPT_RETURNTRANSFER => true,
    ];
        curl_setopt_array($cURL, $cURL_options);
        $result = curl_exec($cURL);
        curl_close($cURL);

        return json_decode($result, true);
    }

    public function getMe()
    {
        return $this->botAPI(__FUNCTION__);
    }

    public function getUpdates($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendMessage($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function forwardMessage($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendPhoto($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendAudio($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendDocument($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendVideo($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendVoice($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendVideoNote($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendMediaGroup($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendLocation($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function editMessageLiveLocation($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function stopMessageLiveLocation($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendVenue($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendContact($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendChatAction($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getUserProfilePhotos($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function kickChatMember($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function unbanChatMember($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function restrictChatMember($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function promoteChatMember($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function exportChatInviteLink($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setChatPhoto($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function deleteChatPhoto($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setChatTitle($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setChatDescription($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function pinChatMessage($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function unpinChatMessage($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function leaveChat($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getChat($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getChatAdministrators($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getChatMembersCount($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getChatMember($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setChatStickerSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function deleteChatStickerSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function answerCallbackQuery($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function editMessageText($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function editMessageCaption($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function editMessageReplyMarkup($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function deleteMessage($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendSticker($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getStickerSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function uploadStickerFile($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function createNewStickerSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function addStickerToSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setStickerPositionInSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function deleteStickerFromSet($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function answerInlineQuery($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendInvoice($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function answerShippingQuery($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function answerPreCheckoutQuery($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function sendGame($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function setGameScore($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }

    public function getGameHighScores($args)
    {
        return $this->botAPI(__FUNCTION__, $args);
    }
}
