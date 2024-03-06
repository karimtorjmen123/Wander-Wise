<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientEventController extends AbstractController
{
    #[Route('/client/event', name: 'app_client_event')]
    public function index(EventRepository $repo): Response
    {
        return $this->render('client_event/index.html.twig', [
            'events' => $repo->findAll(),
        ]);
    }
}
