<?php

namespace Podlodka\Engines\Tcpdf;

use Podlodka\Engines\Renderer;
use Spipu\Html2Pdf\Html2Pdf; // wrapper

class Tcpdf implements Renderer
{
    private Html2Pdf $engine;

    public function __construct() {
        $this->engine = new Html2Pdf();
        $this->engine->writeHTML(self::INVOICE);
    }

    public function render(): void {
        $this->engine->output('/app/output/tcpdf_invoice.pdf', 'F');
    }
}
