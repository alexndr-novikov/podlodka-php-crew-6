<?php

namespace Podlodka\Engines\Snappy;

use Podlodka\Engines\Renderer;
use Knp\Snappy\Pdf;

class Snappy implements Renderer
{
    private Pdf $engine;

    public function __construct() {
        $this->engine = new Pdf('/usr/local/bin/wkhtmltopdf');
        $this->engine->setOption('orientation', 'Portrait');
    }

    public function render() {
        $this->engine->generateFromHtml(Renderer::INVOICE, '/app/output/snappy_invoice.pdf', [], true);
    }
}
