<?php

namespace App\EntityMakerBundle\Service;

use App\EntityBundle\Entity\Entity;

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
     * @param Entity $data
     *
     * @return $this
     */
    public function dispatchPreEvent(Entity $data): self
    {
        $event = $this->getEvent(PreMakeEntityEvent::NAME);
        $event->setData($data);

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
        $event = $this->getEvent(PostMakeEntityEvent::NAME);
        $event->setEntityDto($entity);

        $this->getEventDispatcher()->dispatch($event, PostMakeEntityEvent::NAME);

        return $this;
    }

    public function throwMakeEntityException(string $errorsString)
    {
        throw new MakeEntityException($errorsString);
    }
}
