<?php

namespace App\Notification;

use App\Entity\Contact;


use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactNotification
{

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact)
    {
        $message = (new Email('Demande de Contact'))
            ->setFrom('portfolio@mail.com' )
            ->setTo('nicolas_gaget@yahoo.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->renderer->render('emails/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');
        $this->mailer->send($message);



    }
}
