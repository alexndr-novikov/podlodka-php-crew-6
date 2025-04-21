<?php

namespace Podlodka\Engines\Gotenberg;

use Podlodka\Engines\Renderer;
use Gotenberg\Gotenberg as Pdf;
use Gotenberg\Stream;

class Gotenberg implements Renderer
{
    public function __construct() {
    }

    public function render() {
        Pdf::save(Pdf::chromium('http://gotenberg:3000')
            ->pdf()
            ->html(Stream::string('index.html', Renderer::INVOICE)), '/app/output/');
    }
}

