<?php

namespace LBHurtado\BallotOMR\Drivers;

use LBHurtado\SimpleOMR\SimpleOMR;

class SimpleOMRDriver extends Driver
{
    /** @var SimpleOMR  */
    public $omr;

    /** @var string  */
    protected $imagePath;

    public function __construct(SimpleOMR $omr)
    {
        $this->omr = $omr;
    }

    public function process()
    {
        $this->omr->process($this->getImage());
    }
}