<?php

namespace Clunch\UserBundle\EventListener;

use Clunch\EventBundle\Entity\Event;
use Clunch\UserBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;

class UserDeleteListener
{
    /*
    * PreRemove Event Listener
    *
    * @param LifecycleEventArgs $args
    */
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em     = $args->getEntityManager();
        if ($entity instanceof User) {
            $eventRepository = $em->getRepository(Event::class);
            $events = $eventRepository->findByUser($entity->getId());

            foreach ($events as $event) {
                $em->remove($event);
            }

            $em->flush();
        }
    }
}
