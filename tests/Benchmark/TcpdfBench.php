<?php

namespace Podlodka\Tests\Benchmark;

use Podlodka\Engines\Tcpdf\Tcpdf;

class TcpdfBench
{
    public function benchRender()
    {
        $engine = new Tcpdf();
        $engine->render();
    }
}
