<?php

namespace App\EntityMakerBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DefaultService
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var EventService
     */
    private $eventService;

    public function __construct(
        SerializerInterface $serializer,
        EventDispatcherInterface $eventDispatcher,
        ValidatorInterface $validator,
        EventService $eventService
    ) {
        $this->serializer = $serializer;
        $this->eventDispatcher = $eventDispatcher;
        $this->validator = $validator;
        $this->eventService = $eventService;
    }

    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * @return ValidatorInterface
     */
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    /**
     * @param string $eventName
     *
     * @return object
     */
    public function getEvent(string $eventName): object
    {
        return $this->eventService->getEvent($eventName);
    }
}
