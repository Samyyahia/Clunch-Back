<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-03
 * Time: 10:06
 */

namespace Clunch\NewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Clunch\NewsletterBundle\Entity\Newsletter;

/**
 * Class NewsletterApiController
 * @package Clunch\NewsletterBundle\Controller
 */
class NewsletterApiController extends Controller
{
    /**
     * Function to register to the Newsletter
     * Route: /api/newsletters
     * Method: POST
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postNewsletterAction(Request $request)
    {
        $mail = $request->get('mail') ?: false;
        $phone = $request->get('phone') ?: false;

        if ($mail && $phone) {
            $agreement = $request->get('agreement') ?: false;

            if ($agreement === 'true') {
                $em = $this->getDoctrine()->getManager();

                $newsletterRepository = $em->getRepository(Newsletter::class);
                $alreadySubscribed = $newsletterRepository->findOneBy(['mail'=> $mail,'phone' => $phone]) ?: false;

                if (!$alreadySubscribed) {

                    $applient = new Newsletter();

                    $applient->setMail($mail);
                    $applient->setPhone($phone);
                    $applient->setAgreement($agreement);

                    $em->persist($applient);
                    $em->flush();

                    $error = false;
                    $message = 'Félicitation vous êtes desormais inscrit à notre Newsletter !';
                } else {
                    $error = true;
                    $message = 'Vous êtes déja inscrit à notre Newsletter !';
                }
            } else {
                $error = true;
                $message = 'Veuillez accepter les modalité d\'inscription';
            }
        } else {
            $error = true;
            if (!$mail && !$phone) {
                $message = 'Veuillez fournir une adresse mail et un numero de téléphone avant de valider le formulaire';
            } elseif (!$mail) {
                $message = 'Veuillez fournir une adresse mail avant de valider le formulaire';
            } elseif (!$phone) {
                $message = 'Veuillez fournir un numero de téléphone avant de valider le formulaire';
            } else {
                $message = 'Le formulaire est invalide';
            }
        }

        $res = [
            'error' => $error,
            'message' => $message
        ];

        return new JsonResponse($res);
    }
}
