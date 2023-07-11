<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

## Controller page d'informations' ##
class InfosController extends AbstractController
{
    #[Route('/informations', name: 'app_infos')]
    
    public function infos(): Response
    {
        
        return $this->render('Front/informations.html.twig', [
            'controller_name' => 'InfosController',
        ]);
    }
}