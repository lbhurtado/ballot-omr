<?php

namespace LBHurtado\BallotOMR\Tests;

use LBHurtado\BallotOMR\BallotOMRManager;

class BallotOMRTest extends TestCase
{
    /** @test */
    public function service_has_default_properties()
    {
        tap(app(BallotOMRManager::class), function ($service) {
            $this->assertEquals(
                'simple-omr',
                $service->getDefaultDriver()
            );
            $this->assertSame(
                config('simple-omr.mapPath'),
                $service->driver('simple-omr')->omr->getMapPath()
            );
            $this->assertSame(
                config('simple-omr.tolerance'),
                $service->driver('simple-omr')->omr->getTolerance()
            );
            $this->assertSame(
                config('simple-omr.debugFilePath'),
                $service->driver('simple-omr')->omr->getDebugFilePath()
            );
            $this->assertSame(
                config('simple-omr.debugFileName'),
                $service->driver('simple-omr')->omr->getDebugFileName()
            );
        });
    }
}