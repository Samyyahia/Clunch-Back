<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-04-03
 * Time: 09:24
 */

namespace Clunch\RecipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Clunch\RecipeBundle\Entity\Recipe;

/**
 * Class RecipeApiController
 * @package Clunch\RecipeBundle\Controller
 */
class RecipeApiController extends Controller
{
    /**
     * Function to get Recipe Item by id
     * Route: /api/recipes/{id}
     *
     * @param $id
     * @return JsonResponse
     */
    public function getRecipeAction($id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $recipeRepository = $em->getRepository(Recipe::class);
        $recipeItem = $recipeRepository->findOneById($id);

        $recipeItem = $serializer->toArray($recipeItem);

        return new JsonResponse($recipeItem);
    }
}
