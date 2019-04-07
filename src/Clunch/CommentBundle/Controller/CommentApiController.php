<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-07
 * Time: 18:21
 */

namespace Clunch\CommentBundle\Controller;

use Clunch\CommentBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CommentApiController
 * @package Clunch\CommentBundle\Controller
 */
class CommentApiController extends Controller
{
    /**
     * Function to create a new Comment on a Event
     * Route: /api/comment
     * Method: POST
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function postComment(Request $request)
    {
        $user = $request->get('user') ?: false;
        $content = $request->get('content') ?: false;
        $event = $request->get('event') ?: false;

        if ($user && $content && $event) {
            $em = $this->getDoctrine()->getManager();

            $comment = new Comment();
            $comment->setDate(new \DateTime());
            $comment->setEvent($event);
            $comment->setContent($content);
            $comment->setUser($user);

            $em->persist($comment);
            $em->flush();

            $res['code'] = 200;
            $res['message'] = 'Commentaire posté avec succès';
        } else {
            $res['code'] = 500;
            $res['message'] = 'Champs Manquant';


            if (!$event) {
                $res['champs'][] = 'event';
            }

            if (!$user) {
                $res['champs'][] = 'user';
            }

            if (!$content) {
                $res['champs'][] = 'content';
            }
        }

        return new JsonResponse($res);
    }
}
