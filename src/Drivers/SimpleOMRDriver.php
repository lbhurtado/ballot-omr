<?php

namespace LBHurtado\BallotOMR\Drivers;

use Illuminate\Support\Arr;
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

        return $this;
    }

    public function getResults(): array
    {
        $result = $this->omr->omr->getResult();

        return Arr::pluck($result, 'markedtargets', 'groupname');
    }
}