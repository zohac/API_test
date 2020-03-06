<?php

namespace App\EntityMakerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntityMakerController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     *
     * @return Response
     */
    public function test()
    {
        return $this->render('@EntityMaker/test.html.twig');
    }
}
