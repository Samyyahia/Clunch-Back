<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-04
 * Time: 16:37
 */

namespace Clunch\UserBundle\Controller;

use Application\Sonata\MediaBundle\Entity\Media;
use Clunch\EventBundle\Entity\Event;
use Clunch\UserBundle\Entity\User;
use DateTime;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserApiController
 * @package Clunch\UserBundle\Controller
 */
class UserApiController extends Controller
{
    /**
     * Function to get User List From User Entity
     * Route: /api/users
     * Method: GET
     *
     * @return JsonResponse
     */
    public function getUsersAction() {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        $users = $serializer->toArray($users);

        return new JsonResponse($users);
    }

    /**
     * Function to get single User Item From Category Entity
     * Route: /api/user/{id}
     * Method: GET
     *
     * @param $id
     * @return JsonResponse
     */
    public function getUserAction($id) {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $userRepository = $em->getRepository(User::class);
        $user = $userRepository->find($id);

        $user = $serializer->toArray($user);

        return new JsonResponse($user);
    }

    /**
     * Function to get single User Item From Category Entity
     * Route: /api/user/checks
     * Method: POST
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postUserCheckAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $email = $request->get('email');

        $userRepository = $em->getRepository(User::class);
        $user = $userRepository->findOneByEmail($email);

        $res['code'] = ($user)? 200 : 400;
        $res['message'] = ($res['code'] === 200)? 'Il y a bien un utilisateur a cette adresse mail': 'Il n\'y a aucun utilisateur a cette adresse mail';

        return new JsonResponse($res);
    }


    /**
     * Function to edit a User
     * Route: /api/user/{id}/edit
     * Method: POST
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function postUserEditAction(Request $request, User $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $id;

        if ($request->get('name')) {
            $user->setDisplayName($request->get('name'));
        }

        if ($request->get('pole')) {
            $user->setPole($request->get('pole'));
        }

        if ($request->get('desc')) {
            $user->setDescription($request->get('desc'));
        }

        if ($request->get('image')) {
            $media = new Media();
            $media->setBinaryContent($request->get('image'));
            $media->setContext('default');
            $media->setProviderName('sonata.media.provider.image');

            $em->persist($media);
        }

        $em->persist($user);
        $em->flush();

        return new JsonResponse($user);
    }

    /**
     * Function to get Event List by User
     * Route: /api/user/{user}/events
     * Method: GET
     *
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function getUserEventsAction(User $user)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByRelatedUser($user);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event List by Participating User
     * Route: /api/user/{user}/events/participating
     * Method: GET
     *
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function getUserEventsParticipatingAction(User $user)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findParticipating($user->getId());

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to get Event List Created by User
     * Route: /api/user/{user}/events/created.
     * Method: GET
     *
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function getUserEventsCreatedAction(User $user)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $eventRepository = $em->getRepository(Event::class);
        $event = $eventRepository->findByUser($user->getId(), ['date' => 'ASC']);

        $event = $serializer->toArray($event);

        return new JsonResponse($event);
    }

    /**
     * Function to Create an Event
     * Route: /api/user/{user}/events/create
     * Method: POST
     *
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function postUserEventCreateAction(Request $request, User $user)
    {
        $recipe = $request->get('recipe') ?: false;
        $date = $request->get('date') ?: false;
        $limitDate = $request->get('limitDate') ?: false;
        $desc = $request->get('desc') ?: false;
        $qty = $request->get('quantity') ?: false;

        if ($recipe && $date && $desc && $qty && $limitDate) {
            $em = $this->getDoctrine()->getManager();
            $event = new Event();

            $event->setRecipe($recipe);
            $event->setDate(new DateTime($date));
            $event->setLimitDate(new DateTime($limitDate));
            $event->setDescription($desc);
            $event->setQuantity((int) $qty);
            $event->setUser($user);

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
     * Route: /api/user/{user}/event/{event}/join
     * Method: POST
     *
     * @param User $user
     * @param Event $event
     * @return JsonResponse
     * @throws Exception
     */
    public function postUserEventJoinAction(User $user, Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $event->addParticipant($user);

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
     * Route: /api/user/{user}/event/{event}/leave
     * Method: POST
     *
     * @param User $userss
     * @param Event $event
     * @return JsonResponse
     * @throws Exception
     */
    public function postUserEventLeaveAction(User $user, Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $event->removeParticipant($user);

        $em->persist($event);
        $em->flush();

        $res = [
            'code' => 200,
            'message' => 'Vous avez quitté cet événement avec succès'
        ];

        return new JsonResponse($res);
    }
}
