<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class SampleEvent extends Event
{
    public const NAME = 'sample.event';

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
