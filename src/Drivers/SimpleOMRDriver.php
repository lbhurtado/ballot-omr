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

    public function process($image = null)
    {
        if (!empty($image)) $this->setImage($image);

        $this->omr->process($this->getImage());
    }

    public function getResults()
    {
        $result = $this->omr->omr->getResult();

        return Arr::pluck($result, 'markedtargets', 'groupname');
    }
}