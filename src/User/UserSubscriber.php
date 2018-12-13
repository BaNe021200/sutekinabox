<?php
/**
 * Created by PhpStorm.
 * User: connector
 * Date: 10/12/2018
 * Time: 21:38
 */

namespace App\User;


use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

class UserSubscriber implements EventSubscriberInterface
{
    private $em;

    /**
     * UserSubscriber constructor.
     * @param $em
     */
    public function __construct(ObjectManager $manager)
    {
        $this->em = $manager;
    }


    public static function getSubscribedEvents()
    {
        return[
            SecurityEvents::INTERACTIVE_LOGIN =>'onSecurityInteractiveLogin'
        ];
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
       $user = $event->getAuthenticationToken()->getUser();

       if ($user instanceof User){
           $user->setDerniereConnexion();
           $this->em->flush();
       }


    }
}