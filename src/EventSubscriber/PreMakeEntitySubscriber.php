<?php

namespace App\EventSubscriber;

use App\Event\PreMakeEntityEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PreMakeEntitySubscriber implements EventSubscriberInterface
{
    /**
     * @param PreMakeEntityEvent $event
     */
    public function onEntityMake(PreMakeEntityEvent $event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'pre.make.entity' => 'onEntityMake',
        ];
    }
}
