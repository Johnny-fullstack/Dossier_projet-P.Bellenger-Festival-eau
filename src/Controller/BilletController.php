<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Billeterie;
use App\Form\BilleterieType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

## Controller page de la billeterie##
class BilletController extends AbstractController
{
    #[Route('/billeterie', name: 'app_billet', methods: ['GET', 'POST'])]
    
    public function billet(Request $request, EntityManagerInterface $em, Billeterie $billet, MailerInterface $mailer): Response 
    {
        $billet = new Billeterie();

        $billeterie_form = $this->createForm(BilleterieType::class, $billet);
        $billeterie_form->handleRequest($request);
        
        if (isset($_COOKIE['prix'])) {
            $prix = $_COOKIE['prix'];
        }

        if ($billeterie_form->isSubmitted() && $billeterie_form->isValid()) {
            $em->persist($billet);
            $em->flush();

            $email = (new Email())
                ->from('noreply@example.com')
                ->to($billet->getEmail())
                ->subject('Confirmation de réservation de billets pour le festival\'eau !')
                ->text('Bonjour, Nous vous confirmons la réservation de ' . $billet->getNbpers() . ' billets pour ' . $billet->getJour() . ', vous devrez payer ' . $prix . ' €');
            $mailer->send($email);
            return $this->redirectToRoute('billeterie_confirmation', ['message' => 'Merci ' . $billet->getPrenom() . ' pour votre réservation ! un mail de confirmation viens de vous être envoyé avec toutes les informations nécessaires, à bientôt au Festival\'eau !!']);
            }

        return $this->render('Front/billeterie.html.twig', [
            'controller_name' => 'BilletController',
            'billeterie_form' => $billeterie_form,
        ]);
    }
    #[Route('/confirmation', name: 'app_confirmation')]
    
    public function confirmation(Request $request): Response
    {
        $message = $request->query->get('message');
        
        return $this->render('Front/confirmation.html.twig', [
            'controller_name' => 'ConfirmationController',
            'message' => $message,
        ]);
    }
}


        