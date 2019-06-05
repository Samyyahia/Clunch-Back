<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-09
 * Time: 19:54
 */

namespace Clunch\ApiBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccessListener
{
    public function __construct($serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        $data['user'] = $this->serializer->toArray($user);

        $event->setData($data);
    }
}
