<?php

namespace App\Exception;

class HTTPException extends \Exception
{
    protected $status;
    protected $code;
    protected $title;
    protected $detail;

    public function __construct($status, $code, $title, $detail)
    {
        $this->status = $status;
        $this->code   = $code;
        $this->title  = $title;
        $this->detail = $detail;
    }

    public function send()
    {
        $di = \Phalcon\Di::getDefault();

        $req  = $di->getRequest();
        $res = $di->getResponse();

        if (!$req->get('suppress_response_codes')) {
            $res->setStatusCode($this->status);
        } else {
            $res->setStatusCode(200);
        }

        $error = [
            'status' => $this->status,
            'code'   => $this->code,
            'title'  => $this->title,
            'detail' => $this->detail,
        ];

        $response = new \App\Response\JsonResponse();
        $response->send(['errors' => $error], false);

        error_log(
            'HTTPException: ' . $this->getFile() . ' at ' . $this->getLine(),
            3,
            'httpException.log'
        );
    }
}