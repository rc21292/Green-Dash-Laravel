<?php

namespace App\Http\Controllers\Traits;

trait LockableTrait
{
    public function getLockoutStatus()
    {
        return $this->lockout_time;
    }
}