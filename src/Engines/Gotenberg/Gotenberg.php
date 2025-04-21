<?php

namespace Podlodka\Engines\Gotenberg;

use Podlodka\Engines\Renderer;
use Gotenberg\Gotenberg as Pdf;

class Gotenberg implements Renderer
{
    public function __construct() {
    }

    public function render() {
        $request = Pdf::chromium('http://gotenberg:3000')
            ->pdf()
            ->url('https://first.com');

        $filename = Pdf::save($request, '/app/output/');
    }
}

