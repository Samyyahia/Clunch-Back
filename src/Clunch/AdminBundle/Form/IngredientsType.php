<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 2019-05-17
 * Time: 14:33
 */

namespace Clunch\AdminBundle\Form;

use Clunch\IngredientBundle\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Application\Sonata\MediaBundle\Entity\Media;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class IngredientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qty', IntegerType::class, array(
                'label' => 'Quantité'
            ))
            ->add('unit',TextType::class, array(
                'label'    => 'Unité',
                'required' => false
            ))
            ->add('ingredient', EntityType::class, [
                'label'        => 'Ingrédient',
                'class'        => Ingredient::class,
                'choice_value' => 'name'
            ]);
    }
}
