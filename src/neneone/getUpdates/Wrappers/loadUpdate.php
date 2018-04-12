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

trait loadUpdate
{
    public function loadUpdate()
    {
        return shell_exec('git checkout master && git fetch --all && git reset --hard origin/master && git pull');
    }
}
