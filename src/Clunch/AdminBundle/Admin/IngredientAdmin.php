<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class IngredientAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_ingredients';

    protected $baseRoutePattern = 'ingredients';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label'    => 'Nom de l\'ingrédient'
            ))
            ->add('image', 'sonata_type_model_list', array(
                'label'   => 'Image',
            ), array(
                'link_parameters' => array(
                    'context' => 'default'
                )
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nom de l\'ingrédient'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('name', null, array('label' => 'Nom de l\'ingrédient'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }
}
