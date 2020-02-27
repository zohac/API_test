<?php

namespace App\Controller;

use App\Dto\EntityDto;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class MakeEntityController.
 */
class MakeEntityController extends AbstractController
{
    /**
     * @Route(
     *     "/api/make/entity",
     *     name="makeEntity",
     *     methods={"POST"}
     * )
     *
     * @param Request             $request
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function makeEntity(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $entityDto = null;
        $data = $request->getContent();

        if ($data) {
            $entityDto = $serializer->deserialize($data, EntityDto::class, 'json');
        }

        return $this->json($entityDto);
    }
}
