<?php

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactEventSubscriber
{
    public function __construct(private Mailer $mailer)
    {
    }

    public function sendEmailForContact(ContactRequestEvent $event)
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
    public function subscribe(Dispatcher $dispatcher)
    {
        // Si c'est toujours la meme classe qui a les méthodes alors utilisé cette approche
        return [
            ContactRequestEvent::class => 'sendEmailForContact'
        ];

        // cette approche est plus intéressante si l'on veut utiliser des classes differentes pour la partie envoie (méthode)
//        $dispatcher->listen(
//            ContactRequestEvent::class, [ContactEventSubscriber::class, 'sendEmailForContact']
//        );
    }
}
