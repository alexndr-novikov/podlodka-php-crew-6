<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\WeasyPrint\WeasyPrint;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class WeasyPrintBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new WeasyPrint($params['html']);
        $engine->render();
    }
}