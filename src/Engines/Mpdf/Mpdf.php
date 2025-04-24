<?php

namespace Podlodka\Engines\Mpdf;

use Podlodka\Engines\Renderer;
use Mpdf\Mpdf as Pdf;

class Mpdf
{
    private Pdf $engine;

    public function __construct(string $html) {
        $this->engine = new Pdf(['format' => 'A4-L']);
        $this->engine->WriteHTML($html);
    }

    public function render() {
        $this->engine->Output('/app/output/mpdf_invoice.pdf', \Mpdf\Output\Destination::FILE);
    }
}
