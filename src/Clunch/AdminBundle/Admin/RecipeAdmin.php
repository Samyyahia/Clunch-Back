<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RecipeAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_recipes';

    protected $baseRoutePattern = 'recipes';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array(
                'label'    => 'Titre de la recette'
            ))
            ->add('category', 'sonata_type_model_list', array(
                'label'    => 'Catégorie de la recette',
            ))
            ->add('slug')
            ->add('image', 'sonata_type_model_list', array(
                'label'   => 'Image',
            ), array(
                'link_parameters' => array(
                    'context' => 'default'
                )
            ))
            ->add('body', null, array(
                'label'   => 'Description de la recette'
            ))
            ->add('ingredients', null, array(
                'label'   => 'Ingredients de la recette'
            ))
            ->add('allergy', 'sonata_type_model', array(
                'multiple'     => true,
                'property'     => 'title',
                'sortable'     => true,
                'by_reference' => false,
                'label'        => 'Allergies de la recette'
            ))
            ->add('duration', null, array(
                'label'    => 'Durée de la recette',
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Titre de la recette'))
            ->add('slug')
            ->add('category', null, array(
                'label'    => 'Catégorie de la recette',
            ))
            ->add('duration', null, array('label' => 'Durée de la recette'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('title', null, array('label' => 'Titre de la recette'))
            ->add('slug')
            ->add('category', null, array(
                'label'    => 'Catégorie de la recette',
            ))
            ->add('duration', null, array('label' => 'Durée de la recette'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }
}
