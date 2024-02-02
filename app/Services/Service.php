<?php

namespace App\Services;

abstract class Service
{
    protected $request;

    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
