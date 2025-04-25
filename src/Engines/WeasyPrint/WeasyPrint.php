<?php

namespace Podlodka\Engines\WeasyPrint;

use Pontedilana\PhpWeasyPrint\Pdf;

class WeasyPrint
{
    private string $html;

    public function __construct(string $html)
    {
        $this->html = $html;
    }

    public function render()
    {
        $pdf = new Pdf('/venv/bin/weasyprint');
        $pdf->disableTimeout();
        $microtime = microtime(true);

        $pdf->generateFromHtml(
            $this->html,
            '/app/output/weasy_invoice' . date('Ymd_His', (int)$microtime) . sprintf('_%03d', ($microtime - (int)$microtime) * 1000) . '.pdf'
        );
    }
}