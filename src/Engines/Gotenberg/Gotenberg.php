<?php

namespace Podlodka\Engines\Gotenberg;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Gotenberg\Gotenberg as Pdf;
use Http\Adapter\Guzzle7\Client as GuzzleAdapter;
use GuzzleHttp\Client as GuzzleClient;

class Gotenberg
{
    private Chromium $engine;
    private string $html;

    public function __construct(string $html)
    {
        $this->html = $html;
    }

    public function render()
    {
        $guzzleClient = new GuzzleClient([
            'timeout'         => 180,
            'connect_timeout' => 5,
        ]);

        $httpClient = new GuzzleAdapter($guzzleClient);

        // Multipart form data fields
        $boundary = '----WebKitFormBoundary7MA4YWxkTrZu0gW';

        $body = Utils::streamFor();
        $body->write("--$boundary\r\n");
        $body->write("Content-Disposition: form-data; name=\"files\"; filename=\"index.html\"\r\n");
        $body->write("Content-Type: text/html\r\n\r\n");
        $body->write($this->html . "\r\n");
        $body->write("--$boundary--\r\n");
        $body->rewind();

        // Build a PSR-7 Request manually
        $request = new Request(
            'POST',
            'http://gotenberg:3000/forms/chromium/convert/html',
            [
                'Content-Type' => 'multipart/form-data; boundary=' . $boundary,
            ],
            $body
        );

        // Send and save the result using Pdf::save
        Pdf::save($request, '/app/output/', $httpClient);
    }
}
