<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Chrome\Snappdf;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class HeadlessChromeBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Snappdf($params['html']);
        $engine->render();
    }
}
