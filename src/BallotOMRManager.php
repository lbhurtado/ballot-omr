<?php

namespace LBHurtado\BallotOMR;

use Illuminate\Support\Manager;
use LBHurtado\SimpleOMR\SimpleOMR;
use LBHurtado\BallotOMR\Drivers\SimpleOMRDriver;

class BallotOMRManager extends Manager
{
    /**
     * Get a driver instance.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function channel($name = null)
    {
        return $this->driver($name);
    }

    public function createSimpleOMRDriver()
    {
        return new SimpleOMRDriver(app(SimpleOMR::class));
    }

    /**
     * Get the default SMS driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['ballot-omr.default'] ?? 'null';
    }
}
