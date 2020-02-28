<?php

namespace App\Event;

use App\Dto\EntityDto;
use Symfony\Contracts\EventDispatcher\Event;

class PostMakeEntityEvent extends Event
{
    /**
     * @var EntityDto
     */
    private $entityDto;

    public const NAME = 'post.make.entity';

    /**
     * @return EntityDto
     */
    public function getEntityDto(): EntityDto
    {
        return $this->entityDto;
    }

    /**
     * @param EntityDto $entityDto
     */
    public function setEntityDto(EntityDto $entityDto): void
    {
        $this->entityDto = $entityDto;
    }
}
