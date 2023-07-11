<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

## Controller page de la programmation##
class ProgController extends AbstractController
{
    #[Route('/programmation', name: 'app_prog')]
    
    public function prog(): Response
    {
        return $this->render('Front/programmation.html.twig', [
            'controller_name' => 'ProgController',
        ]);
    }
}