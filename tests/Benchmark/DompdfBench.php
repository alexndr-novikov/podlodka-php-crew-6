<?php

namespace Podlodka\Tests\Benchmark;

use Podlodka\Engines\Dompdf\Dompdf;
class DompdfBench
{
    public function benchRender()
    {
        $engine = new Dompdf();
        $engine->render();
    }
}