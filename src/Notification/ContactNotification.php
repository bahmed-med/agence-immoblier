<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;
 
class ContactNotification {
    
    
    public $mailer;
    
    public $render;


    public function __construct(\Swift_Mailer $mailer, Environment $render) {
        $this->mailer = $mailer;
        $this->render = $render;
    }

    public function notify(Contact $contact){
        
        $message = (new \Swift_Message('Agence'.$contact->getProperty()->getTitre()))
                ->setFrom('noreplay@server.fr')
                ->setTo('contact@agence.fr')
                ->setReplyTo($contact->getEmail())
                ->setBody($this->render('mails/contact.html.twig', [
                    'contact' => $contact,
                    ]), 'text/html');
        
        $this->mailer->send($message);
    }
}
