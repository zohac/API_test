<?php

namespace App\EntityMakerBundle\Event;

use App\EntityBundle\Entity\Entity;
use Symfony\Contracts\EventDispatcher\Event;

class PreMakeEntityEvent extends Event
{
    /**
     * @var Entity
     */
    private $entity;

    /**
     * @var array
     */
    private $context;

    public const NAME = 'pre.make.entity';

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity): void
    {
        $this->entity = $entity;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @param array $context
     */
    public function setContext(array $context): void
    {
        $this->context = $context;
    }
}
