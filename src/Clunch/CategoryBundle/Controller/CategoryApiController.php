<?php
/**
 * Created by PhpStorm.
 * User: Samy Yahia
 * Date: 2019-03-24
 * Time: 17:33
 */

namespace Clunch\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Clunch\CategoryBundle\Entity\Category;
use Clunch\RecipeBundle\Entity\Recipe;

/**
 * Class CategoryApiController
 * @package Clunch\CategoryBundle\Controller
 */
class CategoryApiController extends Controller
{
    /**
     * Function to get Category List From Category Entity
     * Route: /api/categories
     * Method: GET
     *
     * @return JsonResponse
     */
    public function getCategoriesAction()
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();
        $categoryRepository = $em->getRepository(Category::class);
        $categoryList = $categoryRepository->findAll();
        $categoryList = $serializer->toArray($categoryList);

        return new JsonResponse($categoryList);
    }

    /**
     * Function to get Category Item by id
     * Route: /api/categories/{id}
     * Method: GET
     *
     * @param $id
     * @return JsonResponse
     */
    public function getCategoryAction($id)
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getManager();
        $categoryRepository = $em->getRepository(Category::class);
        $categoryItem = $categoryRepository->find($id);

        $recipeRepository = $em->getRepository(Recipe::class);
        $recipeList = $recipeRepository->findByCategory($categoryItem);

        $categoryItem = $serializer->toArray($categoryItem);
        $recipeList = $serializer->toArray($recipeList);

        $res = ['category' => $categoryItem, 'recipies' => $recipeList];

        return new JsonResponse($res);
    }
}
