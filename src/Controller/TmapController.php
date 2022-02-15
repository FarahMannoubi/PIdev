<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TmapController extends AbstractController
{
    /**
     * @Route("/test", name="tmap")
     */
    public function index(): Response
    {
        return $this->render('tmap/index.html.twig', [
            'controller_name' => 'TmapController',
        ]);
    }
}
