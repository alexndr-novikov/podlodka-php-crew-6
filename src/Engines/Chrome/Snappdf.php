<?php

namespace Podlodka\Engines\Chrome;

use Beganovich\Snappdf\Snappdf as Pdf;

class Snappdf
{
    private Pdf $engine;
    private string $html;

    public function __construct(string $html)
    {
        $this->engine = (new Pdf())->setChromiumPath('/usr/bin/chromium');
        $this->html = $html;
    }

    public function render()
    {
        $this->engine
            ->setHtml($this->html)
            ->save('/app/output/chrome_invoice_' . date('Ymd_His') . '.pdf');

    }
}
