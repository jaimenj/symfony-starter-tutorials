<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class NewSampleSubscriber implements EventSubscriberInterface
{
    public function onSampleEvent($event)
    {
        // ...
        touch(__DIR__.'/test.sample.file3');
    }

    public static function getSubscribedEvents()
    {
        return [
            'sample.event' => 'onSampleEvent',
        ];
    }
}
