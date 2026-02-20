<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class APIResponse extends JsonResponse
{
    public function __construct($data = null, $status = 200, $headers = [], $json = false)
    {
        parent::__construct($data, $status, $headers, $json);

        $this->configure();
    }

    protected function configure() {
        $this->setEncodingOptions(JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_OBJECT_AS_ARRAY);

        $this->headers->set('Content-Type', 'application/vnd.api+json; charset=utf-8');
        $this->headers->set('Cache-Control', 'no-cache');
        $this->headers->set('Pragma', 'no-cache');
        $this->headers->set('Expires', '0');
    }
}

