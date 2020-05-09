<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\SampleEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SampleSubscriber implements EventSubscriberInterface
{
    public function onSampleEvent($event)
    {
        // ...
        touch(__DIR__.'/test.sample.file1');
    }

    public function onKernelResponse($event)
    {
        // ...
        touch(__DIR__.'/test.sample.file2');
    }

    public static function getSubscribedEvents()
    {
        return [
            SampleEvent::NAME => 'onSampleEvent',
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }
}
