<?php

namespace Podlodka\Engines\Snappy;

use Knp\Snappy\Pdf;

class Snappy
{
    private Pdf $engine;
    private string $html;
    public function __construct(string $html)
    {
        $this->engine = new Pdf('/usr/bin/wkhtmltopdf');
        $this->engine->setOption('orientation', 'Portrait');
        $this->html = $html;
    }
    public function render()
    {
        $this->engine->generateFromHtml($this->html, '/app/output/snappy_invoice' . date('Ymd_His') . '.pdf', [], true);
    }
}
