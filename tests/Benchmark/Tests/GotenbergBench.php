<?php

namespace Podlodka\tests\Benchmark\Tests;

use Podlodka\Engines\Gotenberg\Gotenberg;
use Podlodka\Tests\Benchmark\AbstractInvoiceBench;

class GotenbergBench extends AbstractInvoiceBench
{
    /**
     * @ParamProviders("provideInvoice")
     */
    public function benchRender(array $params)
    {
        $engine = new Gotenberg($params['html']);
        $engine->render();
    }
}
