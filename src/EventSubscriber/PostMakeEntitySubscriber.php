<?php

namespace App\EventSubscriber;

use App\Event\PostMakeEntityEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostMakeEntitySubscriber implements EventSubscriberInterface
{
    /**
     * @param PostMakeEntityEvent $event
     */
    public function onPostEntityMake(PostMakeEntityEvent $event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'post.make.entity' => 'onPostEntityMake',
        ];
    }
}
