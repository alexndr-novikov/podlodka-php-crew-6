<?php

namespace Podlodka\Tests\Benchmark;

abstract class AbstractInvoiceBench
{
    public function provideInvoice(): \Generator
    {
        foreach (glob(__DIR__ . '/../data/*') as $path) {
            yield basename($path) => [
                'html' => file_get_contents($path)
            ];
        }
    }
}
