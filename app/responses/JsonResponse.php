<?php

namespace App\Response;

use Phalcon\Crypt;

class JsonResponse extends Response
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send($records, $success = true)
    {
        $status = $success ? 'SUCCESS' : 'ERROR';

        $response = $this->di->getResponse();
        $request  = $this->di->getRequest();

        $crypt = new Crypt();
        $etag = $crypt->encryptBase64(serialize($records), 'etag');

        $response->setHeader('X-Status', $status);
        $response->setHeader('E-Tag', $etag);
        $response->setContentType('application/vnd.api+json');
        $response->setHeader('X-Api-Version', '1.0');
        $response->setJsonContent($records);

        $response->send();
    }
}