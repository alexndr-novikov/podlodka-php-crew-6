<?php

namespace Podlodka\Engines\Mpdf;

use Mpdf\Output\Destination;
use Mpdf\Mpdf as Pdf;

class Mpdf
{
    private Pdf $engine;
    public function __construct(string $html)
    {
        $this->engine = new Pdf(['format' => 'A4-L']);
        $this->engine->WriteHTML($html);
    }
    public function render()
    {
        $this->engine->Output('/app/output/mpdf_invoice' . date('Ymd_His') . '.pdf', Destination::FILE);
    }
}
