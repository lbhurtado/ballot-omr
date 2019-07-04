<?php

namespace LBHurtado\BallotOMR\Drivers;

use LBHurtado\BallotOMR\Contracts\BallotOMR;

abstract class Driver implements BallotOMR
{
    /** @var string */
    protected $image;

    abstract public function process();

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Driver
     */
    public function setImage(string $image): Driver
    {
        $this->image = $image;

        return $this;
    }


}