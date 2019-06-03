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
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RecipeApiController
 * @package Clunch\RecipeBundle\Controller
 */
class RecipeApiController extends Controller
{
    /**
     * Function to get Recipe Item by id
     * Route: /api/recipes/{id}
     * Method: GET
     *
     * @param $id
     * @return JsonResponse
     */
    public function getRecipeAction($id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $recipeRepository = $em->getRepository(Recipe::class);
        $recipeItem = $recipeRepository->find($id);

        $recipeItem = $serializer->toArray($recipeItem);

        return new JsonResponse($recipeItem);
    }

    /**
     * Function to get Recipe Item by id
     * Route: /api/recipes/search
     * Method: GET
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getRecipeSearchAction(Request $request)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $query = $request->get('query');

        $recipeRepository = $em->getRepository(Recipe::class);
        $recipes = $recipeRepository->search($query);

        $recipes = $serializer->toArray($recipes);

        return new JsonResponse($recipes);
    }


    /**
     * Function to get Recipe Item by id
     * Route: /api/recipes/recent
     * Method: GET
     *
     * @return JsonResponse
     */
    public function getRecipeRecentAction()
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();

        $recipeRepository = $em->getRepository(Recipe::class);
        $recipes = $recipeRepository->findBy([], ['date' => 'DESC'], 4);

        $recipes = $serializer->toArray($recipes);

        return new JsonResponse($recipes);
    }
}
