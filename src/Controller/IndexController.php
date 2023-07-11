<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

## Controller page d'accueil##
class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    
    public function index(): Response
    {
        return $this->render('Front/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
