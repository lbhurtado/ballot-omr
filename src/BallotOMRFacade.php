<?php

namespace LBHurtado\BallotOMR;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LBHurtado\BallotOMR\Skeleton\SkeletonClass
 */
class BallotOMRFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ballotomr';
    }
}
