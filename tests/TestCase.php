<?php

namespace LBHurtado\BallotOMR\Tests;

use LBHurtado\BallotOMR\BallotOMRManager;
use LBHurtado\BallotOMR\BallotOMRServiceProvider;
use LBHurtado\SimpleOMR\SimpleOMRServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BallotOMRServiceProvider::class,
            SimpleOMRServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'BallotOMR' => BallotOMRManager::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('simple-omr.mapPath', 'tests/omr.json');
        $app['config']->set('simple-omr.debugFilePath', 'tests/');
        $app['config']->set('simple-omr.debugFileName', 'omr-debug.png');
        $app['config']->set('simple-omr.tolerance', 35);
    }
}