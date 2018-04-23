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

class Logger
{
    const VERBOSE = 4;
    const NOTICE = 3;
    const WARNING = 2;
    const ERROR = 1;
    const FATAL_ERROR = 0;
    public static $mode;
    public static $level;

    public static function __getColouredString($string, $text_colour = 'light_gray', $background_colour = null)
    {
        $text_colours = [
      'black'        => '0;30',
      'dark_gray'    => '1;30',
      'blue'         => '0;34',
      'light_blue'   => '1;32',
      'green'        => '0;32',
      'light_green'  => '1;32',
      'cyan'         => '0;36',
      'light_cyan'   => '1;36',
      'red'          => '0;31',
      'light_red'    => '1;31',
      'purple'       => '0;35',
      'light_purple' => '1;35',
      'brown'        => '0;33',
      'yellow'       => '1;33',
      'light_gray'   => '0;37',
      'white'        => '1;37',
    ];
        $background_colours = [
      'black'      => '40',
      'red'        => '41',
      'green'      => '42',
      'yellow'     => '43',
      'blue'       => '44',
      'magenta'    => '45',
      'cyan'       => '46',
      'light_gray' => '47',
    ];
        $new_string = '';
        if (isset($text_colours[$text_colour])) {
            $new_string .= "\033[".$text_colours[$text_colour].'m';
        }
        if (isset($background_colours[$background_colour])) {
            $new_string .= "\033[".$background_colours[$background_colour].'m';
        }
        $new_string .= $string."\033[0m";

        return $new_string;
    }

    public static function __static_construct($mode, $level)
    {
        self::$mode = $mode;
        self::$level = $level;
    }

    public static function log($message, $level = self::NOTICE)
    {
        if ($level > self::$level || self::$mode == 0) {
            return;
        }
        self::logger($message, $level);
    }

    public static function logger($message, $level = self::NOTICE, $suffix = PHP_EOL)
    {
        switch ($level) {
          case self::VERBOSE:
          $msg = self::__getColouredString($message, 'light_gray');
          break;
          case self::NOTICE:
          $msg = self::__getColouredString($message, 'light_gray');
          break;
          case self::WARNING:
          $msg = self::__getColouredString($message, 'yellow');
          break;
          case self::ERROR:
          $msg = self::__getColouredString($message, 'red');
          break;
          case self::FATAL_ERROR:
          $msg = self::__getColouredString($message, 'light_gray', 'red');
          break;
          default:
          $msg = $message;
          break;
        }
        echo $msg.$suffix;
    }
}
