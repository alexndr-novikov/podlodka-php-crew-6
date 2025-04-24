<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Snappy\Snappy;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class SnappyBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Snappy($params['html']);
        $engine->render();
    }
}
