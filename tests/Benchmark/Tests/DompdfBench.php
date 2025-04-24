<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Dompdf\Dompdf;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class DompdfBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Dompdf($params['html']);
        $engine->render();
    }
}