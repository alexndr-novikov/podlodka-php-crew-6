<?php

namespace Podlodka\Tests\Benchmark;

use Podlodka\Engines\Snappy\Snappy;

class SnappyBench
{
    public function benchRender()
    {
        $engine = new Snappy();
        $engine->render();
    }
}
