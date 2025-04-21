<?php

namespace Podlodka\Tests\Benchmark;

use Podlodka\Engines\Gotenberg\Gotenberg;

class GotenbergBench
{
    public function benchRender()
    {
        $engine = new Gotenberg();
        $engine->render();
    }
}
