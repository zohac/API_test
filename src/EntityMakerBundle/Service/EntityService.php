<?php

namespace App\EntityMakerBundle\Service;

use App\EntityBundle\Entity\Entity;
use App\EntityMakerBundle\Event\PostMakeEntityEvent;
use App\EntityMakerBundle\Event\PreMakeEntityEvent;
use App\EntityMakerBundle\Exception\MakeEntityException;

class EntityService extends DefaultService
{
    /**
     * @param Entity $entity
     *
     * @return Entity
     */
    public function persist(Entity $entity): Entity
    {
        $this->dispatchPreEvent($entity);

        // Avec le FileSystemService, écrire l'entité

        $this->dispatchPostEvent($entity);

        return $entity;
    }

    /**
     * @param Entity $entity
     *
     * @return $this
     */
    public function dispatchPreEvent(Entity $entity): self
    {
        /** @var PreMakeEntityEvent $event */
        $event = $this->getEvent(PreMakeEntityEvent::NAME);
        $event->setEntity($entity);

        $this->getEventDispatcher()->dispatch($event, PreMakeEntityEvent::NAME);

        return $this;
    }

    /**
     * @param Entity $entity
     *
     * @return $this
     */
    public function dispatchPostEvent(Entity $entity): self
    {
        /** @var PostMakeEntityEvent $event */
        $event = $this->getEvent(PostMakeEntityEvent::NAME);
        $event->setEntity($entity);

        $this->getEventDispatcher()->dispatch($event, PostMakeEntityEvent::NAME);

        return $this;
    }

    public function throwMakeEntityException(string $errorsString)
    {
        throw new MakeEntityException($errorsString);
    }
}
