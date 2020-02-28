<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class DefaultController extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * DefaultController constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer
    ) {
        $this->serializer = $serializer;
    }

    /**
     * @param $data
     * @param int   $status
     * @param array $headers
     * @param array $context
     *
     * @return JsonResponse
     */
    public function jsonLd($data, int $status = 200, array $headers = [], array $context = []): JsonResponse
    {
        $jsonLd = $this->serializer->serialize($data, 'jsonld', $context);

        return new JsonResponse($jsonLd, $status, $headers, true);
    }
}
