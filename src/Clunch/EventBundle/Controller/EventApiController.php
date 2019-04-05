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

/**
 * Class EventApiController
 * @package Clunch\EventBundle\Controller
 */
class EventApiController extends Controller
{
    /**
     * Function to get Event List by User Company
     * Route: /api/events/{id}/company
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
     * Route: /api/events/{id}/company
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
     * Route: /api/events/{id}/company
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
}
