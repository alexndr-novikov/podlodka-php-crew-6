<?php

namespace Podlodka\Tests\Benchmark;

use Podlodka\Engines\Mpdf\Mpdf;

class MpdfBench
{
    public function benchRender()
    {
        $engine = new Mpdf();
        $engine->render();
    }
}
