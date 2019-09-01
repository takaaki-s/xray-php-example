<?php

namespace App\Lib;

use Pkerrigan\Xray\SqlSegment;

class MySqlSegment extends SqlSegment
{
    public function end($microtime = null)
    {
        $this->endTime = is_null($microtime) ? microtime(true) : $this->startTime + $microtime;
        return $this;
    }
}
