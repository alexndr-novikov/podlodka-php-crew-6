<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Tcpdf\Tcpdf;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class TcpdfBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Tcpdf($params['html']);
        $engine->render();
    }
}
