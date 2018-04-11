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

interface botAPIScheme
{
    public function getMe();

    public function getUpdates($args);

    public function sendMessage($args);

    public function forwardMessage($args);

    public function sendPhoto($args);

    public function sendAudio($args);

    public function sendDocument($args);

    public function sendVideo($args);

    public function sendVoice($args);

    public function sendVideoNote($args);

    public function sendMediaGroup($args);

    public function sendLocation($args);

    public function editMessageLiveLocation($args);

    public function stopMessageLiveLocation($args);

    public function sendVenue($args);

    public function sendContact($args);

    public function sendChatAction($args);

    public function getUserProfilePhotos($args);

    public function kickChatMember($args);

    public function unbanChatMember($args);

    public function restrictChatMember($args);

    public function promoteChatMember($args);

    public function exportChatInviteLink($args);

    public function setChatPhoto($args);

    public function deleteChatPhoto($args);

    public function setChatTitle($args);

    public function setChatDescription($args);

    public function pinChatMessage($args);

    public function unpinChatMessage($args);

    public function leaveChat($args);

    public function getChat($args);

    public function getChatAdministrators($args);

    public function getChatMembersCount($args);

    public function getChatMember($args);

    public function setChatStickerSet($args);

    public function deleteChatStickerSet($args);

    public function answerCallbackQuery($args);

    public function editMessageText($args);

    public function editMessageCaption($args);

    public function editMessageReplyMarkup($args);

    public function deleteMessage($args);

    public function sendSticker($args);

    public function getStickerSet($args);

    public function uploadStickerFile($args);

    public function createNewStickerSet($args);

    public function addStickerToSet($args);

    public function setStickerPositionInSet($args);

    public function deleteStickerFromSet($args);

    public function answerInlineQuery($args);

    public function sendInvoice($args);

    public function answerShippingQuery($args);

    public function answerPreCheckoutQuery($args);

    public function sendGame($args);

    public function setGameScore($args);

    public function getGameHighScores($args);
}
