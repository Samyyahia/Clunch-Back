<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-05
 * Time: 09:19
 */

namespace Clunch\EventBundle\Controller;

use Clunch\CompanyBundle\Entity\Company;
use Clunch\EventBundle\Entity\Event;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class EventApiController
 * @package Clunch\EventBundle\Controller
 */
class EventApiController extends Controller
{
    /**
     * Function to get Event Item by id
     * Route: /api/event/{id}
     * Method: GET
     *
     * @param $id
     * @return JsonResponse
     */
    public function getEventAction($id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->find($id);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to Delete an Event
     * Route: /api/event/{event}
     * Method: DELETE
     *
     * @param Event $event
     * @return JsonResponse
     * @throws Exception
     */
    public function deleteEventAction(Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($event);
        $em->flush();

        $res = [
            'code' => 200,
            'message' => 'Vous avez supprimeé cet événement avec succès'
        ];

        return new JsonResponse($res);
    }
}
