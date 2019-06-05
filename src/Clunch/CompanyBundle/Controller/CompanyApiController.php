<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-05
 * Time: 09:19
 */

namespace Clunch\CompanyBundle\Controller;

use Clunch\CompanyBundle\Entity\Company;
use Clunch\EventBundle\Entity\Event;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class CompanyApiController
 * @package Clunch\CompanyBundle\Controller
 */
class CompanyApiController extends Controller
{
    /**
     * Function to get Event List by User Company
     * Route: /api/company/{company}/events
     * Method: GET
     *
     * @param Company $company
     * @return JsonResponse
     * @throws Exception
     */
    public function getCompanyEventsAction(Company $company)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUserCompany($company);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event List by date and Company
     * Route: /api/company/{company}/date/{date}/events
     * Method: GET
     *
     * @param Company $company
     * @param DateTime $date
     * @return JsonResponse
     * @throws Exception
     */
    public function getCompanyDateEventsAction(Company $company, DateTime $date)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUserCompanyAndDate($company, $date);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }
}
