<?php

use CodeIgniter\HTTP\RequestInterface;

class MyRequestValidator
{
    protected $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function processSth(): void
    {
        log_message('info', 'processSth...');
    }
}
