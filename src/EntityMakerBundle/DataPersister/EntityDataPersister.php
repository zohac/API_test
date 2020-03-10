<?php

namespace App\EntityMakerBundle\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\EntityBundle\Entity\Entity;
use App\EntityMakerBundle\Service\EntityService;

class EntityDataPersister implements ContextAwareDataPersisterInterface
{
    /**
     * @var EntityService
     */
    private $entityService;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Entity;
    }

    public function persist($data, array $context = [])
    {
        /** @var Entity $entity */
        $entity = $this->entityService->persist($data, $context);

        return $entity;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data
    }
}
