<?php

namespace LBHurtado\BallotOMR\Tests;

use LBHurtado\SimpleOMR\SimpleOMR;
use LBHurtado\BallotOMR\Facades\BallotOMR;
use LBHurtado\BallotOMR\Drivers\SimpleOMRDriver;

class SimpleOMRTest extends TestCase
{
    public function tearDown(): void
    {
        $filename = config('simple-omr.debugFilePath').config('simple-omr.debugFileName');

        if (file_exists($filename))
            unlink($filename);

        parent::tearDown();
    }

    /** @test */
    public function SimpleOMR_driver_works()
    {
        /*** arrange ***/
        $filename = config('simple-omr.debugFilePath').config('simple-omr.debugFileName');
        $imagepath = "tests/ballot.jpg";

        /*** assert ***/
        $this->assertFalse(file_exists($filename));

        /*** act */
        (new SimpleOMRDriver(app( SimpleOMR::class)))->setImage($imagepath)->process();

        /*** assert ***/
        $this->assertTrue(file_exists($filename));
    }

    /** @test */
    public function BallotOMR_facade_works()
    {
        /*** arrange ***/
        $filename = config('simple-omr.debugFilePath').config('simple-omr.debugFileName');
        $imagepath = "tests/ballot.jpg";

        /*** assert ***/
        $this->assertFalse(file_exists($filename));

        /*** act */
        BallotOMR::setImage($imagepath)->process();

        /*** assert ***/
        $this->assertTrue(file_exists($filename));
    }
}
