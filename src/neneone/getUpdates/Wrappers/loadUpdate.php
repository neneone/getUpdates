<?php

namespace neneone\getUpdates\Wrappers;

trait loadUpdate {
  public function loadUpdate() {
    return shell_exec('git checkout master && git fetch --all && git reset --hard origin/master && git pull');
  }
}


 ?>
