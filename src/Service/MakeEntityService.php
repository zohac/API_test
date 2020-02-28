<?php

namespace App\Service;

use App\Dto\EntityDto;
use App\Event\PostMakeEntityEvent;
use App\Event\PreMakeEntityEvent;
use App\Exception\MakeEntityException;

class MakeEntityService extends DefaultService
{
    /**
     * @param string $data
     * @param array  $context
     *
     * @return EntityDto
     *
     * @throws MakeEntityException
     */
    public function transform(?string $data = null, array $context = []): EntityDto
    {
        if (!$data) {
            $this->throwMakeEntityException('Aucun fichier json envoyé avec la méthode post');
        }

        $this->dispatchPreEvent($data);

        $entityDto = $this->getSerializer()->deserialize($data, EntityDto::class, 'json');
        $this->validate($entityDto);

        $this->dispatchPostEvent($entityDto);

        return $entityDto;
    }

    /**
     * @param string $data
     *
     * @return $this
     */
    public function dispatchPreEvent(string $data): self
    {
        $event = $this->getEvent(PreMakeEntityEvent::NAME);
        $event->setData($data);

        $this->getEventDispatcher()->dispatch($event, PreMakeEntityEvent::NAME);

        return $this;
    }

    /**
     * @param EntityDto $entityDto
     *
     * @return $this
     */
    public function dispatchPostEvent(EntityDto $entityDto): self
    {
        $event = $this->getEvent(PostMakeEntityEvent::NAME);
        $event->setEntityDto($entityDto);

        $this->getEventDispatcher()->dispatch($event, PostMakeEntityEvent::NAME);

        return $this;
    }

    /**
     * @param EntityDto $entityDto
     *
     * @throws MakeEntityException
     */
    public function validate(EntityDto $entityDto)
    {
        $errors = $this->getValidator()->validate($entityDto);

        if (count($errors) > 0) {
            /*
             * Uses a __toString method on the $errors variable which is a
             * ConstraintViolationList object. This gives us a nice string
             * for debugging.
             */
            $errorsString = (string) $errors;

            $this->throwMakeEntityException($errorsString);
        }
    }

    public function throwMakeEntityException(string $errorsString)
    {
        throw new MakeEntityException($errorsString);
    }
}
