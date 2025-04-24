<?php

namespace Podlodka\Engines\Dompdf;

use Podlodka\Engines\Renderer;
use Dompdf\Dompdf as Pdf;

class Dompdf implements Renderer
{
    private Pdf $engine;
    public function __construct() {
        $this->engine = new Pdf();
        $this->engine->loadHtml(Renderer::INVOICE);
        $this->engine->setPaper('A4');
    }
    public function render() {
        $this->engine->render();
        $output = $this->engine->output();
        file_put_contents('/app/output/dompdf_invoice.pdf', $output);
    }
}
