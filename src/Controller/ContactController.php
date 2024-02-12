<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\VarDumper\Cloner\Data;

class ContactController extends AbstractController
{
  #[Route('/contact', name: 'app_contact')]  //, methods: ['GET', 'POST']
  public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
  {
    $contact = new Contact();
    $form = $this->createForm(ContactType::class, $contact);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $contactFormData = $form->getData();
      $contact->setDateEnvoi(new DateTime());
      $entityManager->persist($contact);
      $entityManager->flush();
      $email = (new Email())
        ->priority(Email::PRIORITY_HIGH)
        ->from($contact->getEmail())
        ->to('test@gmail.com')
        ->subject('Formulaire contact V. Parrot')
        ->text(
          'Expéditeur : ' . $contact->getNom() . ' ' . $contact->getPrenom() . \PHP_EOL .
            'E-mail : ' . $contact->getEmail() . \PHP_EOL .
            'Téléphone : ' . $contact->getTel() . \PHP_EOL .
            'Message : ' . $contact->getMessage() . \PHP_EOL .
            'Date : ' . $contact->getDateEnvoi()->format('Y-m-d H:i:s'),
          'text/plain'
        );

      try {
        $mailer->send($email);
        $this->addFlash('success', 'Votre message a été envoyé.');
      } catch (TransportExceptionInterface $e) {
        echo $e->getDebug();
        // some error prevented the email sending; display an
        // error message or try to resend the message

      }

      return $this->redirectToRoute('app_contact');
    }

    return $this->render('contact/index.html.twig', [
      'contact_form' => $form->createView(),
    ]);
  }
}
