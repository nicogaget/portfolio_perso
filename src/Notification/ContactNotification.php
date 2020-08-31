<?php

namespace App\Notification;

use App\Entity\Contact;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment;

class ContactNotification
{

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(MailerInterface $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact)
    {
//        $message = (new Email('Demande de Contact'))
//            ->setFrom('portfolio@mail.com' )
//            ->setTo('nicolas_gaget@yahoo.fr')
//            ->setReplyTo($contact->getEmail())
//            ->setBody($this->renderer->render('emails/contact.html.twig', [
//                'contact' => $contact
//            ]), 'text/html');
//        $this->mailer->send($message);

        $email = (new TemplatedEmail())
            ->from('Portfolio@mail.com')
            ->to ('n.gaget69@gmail.com')
            ->subject('Message de votre portfolio')
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact
            ]);
        $this->mailer->send($email);


    }
}
