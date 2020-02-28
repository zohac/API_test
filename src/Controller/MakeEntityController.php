<?php

namespace App\Controller;

use App\Exception\MakeEntityException;
use App\Service\MakeEntityService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MakeEntityController.
 */
class MakeEntityController extends DefaultController
{
    /**
     * @Route(
     *     "/api/make/entity",
     *     name="makeEntity",
     *     methods={"POST"}
     * )
     *
     * @param Request           $request
     * @param MakeEntityService $entityService
     *
     * @return JsonResponse
     *
     * @throws MakeEntityException
     */
    public function makeEntity(Request $request, MakeEntityService $entityService): JsonResponse
    {
        $entityDto = $entityService->transform($request->getContent());

        return $this->jsonLd($entityDto);
    }
}
