<?php

namespace LBHurtado\BallotOMR\Facades;

use Illuminate\Support\Facades\Facade;

class BallotOMR extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ballot-omr';
    }
}
