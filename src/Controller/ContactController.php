<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();

            // Ici nous envoyons le mail 
            $message = (new \Swift_Message($contact['objet']))
            // On attribue l'expéditeur
            ->setFrom($mail = $contact['email'])
            ->setReplyTo($mail)

            // On attribue le destinataire
            ->setTo('halit.cinici@live.fr')

            //on crée le message avec la vue Twig
            ->setBody(
                $this->renderView('contact/email.html.twig', compact('contact')),
                'text/html'
            );

            // On envoie le message
            $mailer->send($message);

            $this->addFlash('message', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('home');
        }

        return $this->render('contact/contact.html.twig', [
            'contactform' => $form->createView()
        ]);
    }
}
