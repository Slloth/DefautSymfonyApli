<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurvesController extends AbstractController
{
    #[Route('/curves', name: 'curves')]
    public function index(): Response
    {
        return $this->render('curves/index.html.twig', [
            'controller_name' => 'CurvesController',
        ]);
    }
}
