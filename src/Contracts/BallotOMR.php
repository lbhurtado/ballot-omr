<?php

namespace LBHurtado\BallotOMR\Contracts;

interface BallotOMR
{
    /**
     * Process the given image.
     *
     * @return mixed
     */
    public function process();
}