<?php

namespace App\EntityMakerBundle\Service;

use App\Event\PostMakeEntityEvent;
use App\Event\PreMakeEntityEvent;

class EventService
{
    private $events = [
        PreMakeEntityEvent::NAME => 'PreMakeEntityEvent',
        PostMakeEntityEvent::NAME => 'PostMakeEntityEvent',
    ];

    /**
     * @var PreMakeEntityEvent
     */
    private $preMakeEntityEvent;

    /**
     * @var PostMakeEntityEvent
     */
    private $postMakeEntityEvent;

    public function __construct(
        PreMakeEntityEvent $preMakeEntityEvent,
        PostMakeEntityEvent $postMakeEntityEvent
    ) {
        $this->preMakeEntityEvent = $preMakeEntityEvent;
        $this->postMakeEntityEvent = $postMakeEntityEvent;
    }

    /**
     * @return PreMakeEntityEvent
     */
    public function getPreMakeEntityEvent(): PreMakeEntityEvent
    {
        return $this->preMakeEntityEvent;
    }

    /**
     * @return PostMakeEntityEvent
     */
    public function getPostMakeEntityEvent(): PostMakeEntityEvent
    {
        return $this->postMakeEntityEvent;
    }

    public function getEvent(string $eventName)
    {
        $method = 'get'.$this->events[$eventName];

        return $this->$method();
    }
}