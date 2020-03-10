<?php

namespace App\EntityMakerBundle\Event;

use App\EntityBundle\Entity\Entity;
use Symfony\Contracts\EventDispatcher\Event;

class PostMakeEntityEvent extends Event
{
    /**
     * @var Entity
     */
    private $entity;

    public const NAME = 'post.make.entity';

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
}
