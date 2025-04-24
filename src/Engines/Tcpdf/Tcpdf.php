<?php

namespace Podlodka\Engines\Tcpdf;

use Podlodka\Engines\Renderer;
use Spipu\Html2Pdf\Html2Pdf; // wrapper

class Tcpdf
{
    private Html2Pdf $engine;

    public function __construct(string $html) {
        $this->engine = new Html2Pdf();
        $this->engine->writeHTML($html);
    }

    public function render(): void {
        $this->engine->output('/app/output/tcpdf_invoice.pdf', 'F');
    }
}
