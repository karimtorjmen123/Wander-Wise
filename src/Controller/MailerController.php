<?php

namespace App\Controller;

use App\Form\MailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Transport;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function indexmailer(Request $request): Response
    {
        $form = $this->createForm(MailType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $transport = Transport::fromDsn('smtp://tamimhmizi7@gmail.com:ycpqndhzdnnrijpa@smtp.gmail.com:587');
            $mailer = new Mailer($transport);
            $email = (new Email())
                ->from('tamimhmizi7@gmail.com')
                ->to($formData['to'])
                ->subject($formData['subject'])
                ->text($formData['message']);

            $mailer->send($email);

            $this->addFlash('success', 'Email sent successfully!');

            return $this->redirectToRoute('app_mailer');
        }

        return $this->render('mailer/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
