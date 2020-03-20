<?php

namespace App\EntityMakerBundle\Service;

use App\EntityBundle\Entity\Entity;
use App\EntityMakerBundle\Event\PostMakeEntityEvent;
use App\EntityMakerBundle\Event\PreMakeEntityEvent;
use App\EntityMakerBundle\Exception\MakeEntityException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EntityService extends DefaultService
{
    /**
     * @param Entity $entity
     * @param array  $context
     *
     * @return Entity
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function persist(Entity $entity, array $context): Entity
    {
        $this->dispatchPreEvent($entity, $context);

        // TODO: Vérifier si l'entité existe ou non
        // Si elle n'existe pas, la créer
        $this->createNewEntity($entity);
        $this->createNewRepository($entity);

        // Si elle existe, la mettre à jour
        // $this->updateEntity($entity)

        $this->dispatchPostEvent($entity, $context);

        return $entity;
    }

    /**
     * @param Entity $entity
     * @param array  $context
     *
     * @return $this
     */
    public function dispatchPreEvent(Entity $entity, array $context): self
    {
        /** @var PreMakeEntityEvent $event */
        $event = $this->getEvent(PreMakeEntityEvent::NAME);
        $event->setEntity($entity);
        $event->setContext($context);

        $this->getEventDispatcher()->dispatch($event, PreMakeEntityEvent::NAME);

        return $this;
    }

    /**
     * @param Entity $entity
     * @param array  $context
     *
     * @return $this
     */
    public function dispatchPostEvent(Entity $entity, array $context): self
    {
        /** @var PostMakeEntityEvent $event */
        $event = $this->getEvent(PostMakeEntityEvent::NAME);
        $event->setEntity($entity);
        $event->setContext($context);

        $this->getEventDispatcher()->dispatch($event, PostMakeEntityEvent::NAME);

        return $this;
    }

    /**
     * @param Entity $entity
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function createNewEntity(Entity $entity)
    {
        $repositoryFullClassName = ucfirst($entity->getClassName()).'Repository.php';
        // Avec le FileSystemService, écrire l'entité
        $content = $this->render('@EntityMaker/entity.skeleton.twig', [
            'entity' => $entity,
            'repositoryFullClassName' => $repositoryFullClassName,
        ]);

        $this->getFilesystem()->createNewEntity($entity, $content);
    }

    public function createNewRepository(Entity $entity)
    {
//        $repositoryFullClassName = ucfirst($entity->getClassName()).'Repository.php';
//        // Avec le FileSystemService, écrire l'entité
//        $content = $this->render('@EntityMaker/entity.skeleton.twig', [
//            'entity' => $entity,
//            'repositoryFullClassName' => $repositoryFullClassName,
//        ]);
//
//        $this->getFilesystem()->createNewEntity($entity, $content);
    }

    /**
     * @param string $errorsString
     *
     * @throws MakeEntityException
     */
    public function throwMakeEntityException(string $errorsString)
    {
        throw new MakeEntityException($errorsString);
    }
}
