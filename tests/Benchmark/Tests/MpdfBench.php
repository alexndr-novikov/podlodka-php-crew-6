<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Mpdf\Mpdf;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class MpdfBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Mpdf($params['html']);
        $engine->render();
    }
}
