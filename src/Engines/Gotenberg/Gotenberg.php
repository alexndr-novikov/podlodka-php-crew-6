<?php

namespace Podlodka\Engines\Gotenberg;

use Gotenberg\Modules\Chromium;
use Podlodka\Engines\Renderer;
use Gotenberg\Gotenberg as Pdf;
use Gotenberg\Stream;

class Gotenberg implements Renderer
{
    private Chromium $engine;

    public function __construct() {
        $this->engine = Pdf::chromium('http://gotenberg:3000');
    }

    public function render() {
        Pdf::save($this->engine
            ->pdf()
            ->html(Stream::string('index.html', Renderer::INVOICE)), '/app/output/');
    }
}

