<?php

namespace App\EntityMakerBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FilesystemService
     */
    private $filesystem;

    public function __construct(
        SerializerInterface $serializer,
        EventDispatcherInterface $eventDispatcher,
        ValidatorInterface $validator,
        EventService $eventService,
        Environment $twig,
        FilesystemService $filesystem
    ) {
        $this->serializer = $serializer;
        $this->eventDispatcher = $eventDispatcher;
        $this->validator = $validator;
        $this->eventService = $eventService;
        $this->twig = $twig;
        $this->filesystem = $filesystem;
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

    /**
     * @return Environment
     */
    public function getTwig(): Environment
    {
        return $this->twig;
    }

    /**
     * @param string     $template
     * @param array|null $options
     *
     * @return string
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $template, ?array $options = []): string
    {
        return $this->twig->render($template, $options);
    }

    /**
     * @return FilesystemService
     */
    public function getFilesystem(): FilesystemService
    {
        return $this->filesystem;
    }
}
