<?php

namespace App\Contracts;

interface SlackInterface
{
    public function send($content, $type = 0);
}
