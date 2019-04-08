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
use Clunch\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EventApiController
 * @package Clunch\EventBundle\Controller
 */
class EventApiController extends Controller
{
    /**
     * Function to get Event List by User Company
     * Route: /api/events/{company_id}/company
     * Method: GET
     *
     * @param Company $company_id
     * @return JsonResponse
     * @throws \Exception
     */
    public function getEventsCompanyAction(Company $company_id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUserCompany($company_id);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event List by User
     * Route: /api/events/{user_id}/user
     * Method: GET
     *
     * @param User $user_id
     * @return JsonResponse
     * @throws \Exception
     */
    public function getEventsUserAction(User $user_id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByRelatedUser($user_id);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event Item by id
     * Route: /api/events/{id}
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
     * Function to get Event List by date and Company
     * Route: /api/events/{company_id}/companies/{date}/date
     * Method: GET
     *
     * @param Company $company_id
     * @param \DateTime $date
     * @return JsonResponse
     * @throws \Exception
     */
    public function getEventsCompanyDateAction(Company $company_id, \DateTime $date)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUserCompanyAndDate($company_id, $date);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event List by date and Company
     * Route: /api/events/{$company_id}/company/{date}
     * Method: GET
     *
     * @param Company $company_id
     * @param \DateTime $date
     * @return JsonResponse
     * @throws \Exception
     */
    public function getUserEvent(Company $company_id, \DateTime $date)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUserCompanyAndDate($company_id, $date);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to Create an Event
     * Route: /api/events/{user_id}/create
     * Method: POST
     *
     * @param Request $request
     * @param User $user_id
     * @return JsonResponse
     * @throws \Exception
     */
    public function postEventCreateAction(Request $request, User $user_id)
    {

        $recipe = $request->get('recipe') ?: false;
        $date = $request->get('date') ?: false;
        $desc = $request->get('desc') ?: false;
        $qty = $request->get('quantity') ?: false;

        if ($recipe && $date && $desc && $qty) {
            $em = $this->getDoctrine()->getManager();
            $event = new Event();

            $event->setRecipe($recipe);
            $event->setDate(new \DateTime($date));
            $event->setDescription($desc);
            $event->setQuantity((int) $qty);
            $event->setUser($user_id);

            $em->persist($event);
            $em->flush();

            $res['code'] = 200;
            $res['message'] = 'Evenement Ajouté avec succès';
        } else {
            $res['code'] = 500;
            $res['message'] = 'Champs Manquant(s) :';

            if (!$recipe) {
                $res['champs'][] = 'recipe';
            }
            if (!$date) {
                $res['champs'][] = 'date';
            }
            if (!$desc) {
                $res['champs'][] = 'desc';
            }
            if (!$qty) {
                $res['champs'][] = 'quantity';
            }
        }

        return new JsonResponse($res);
    }

    /**
     * Function to Join an Event
     * Route: /api/events/{event_id}/users/{user_id}/joins
     * Method: POST
     *
     * @param Event $event
     * @param User $user_id
     * @return JsonResponse
     * @throws \Exception
     */
    public function postEventUserJoinAction(Event $event, User $user_id)
    {
        $em = $this->getDoctrine()->getManager();

        $event->addParticipant($user_id);

        $em->persist($event);
        $em->flush();

        $res = [
            'code' => 200,
            'message' => 'Vous avez rejoint cet événement avec succès'
        ];

        return new JsonResponse($res);
    }

    /**
     * Function to Leave an Event
     * Route: /api/events/{event_id}/users/{user_id}/leaves
     * Method: POST
     *
     * @param Event $event
     * @param User $user_id
     * @return JsonResponse
     * @throws \Exception
     */
    public function postEventUserLeaveAction(Event $event, User $user_id)
    {
        $em = $this->getDoctrine()->getManager();

        $event->removeParticipant($user_id);

        $em->persist($event);
        $em->flush();

        $res = [
            'code' => 200,
            'message' => 'Vous avez quitté cet événement avec succès'
        ];

        return new JsonResponse($res);
    }
}
