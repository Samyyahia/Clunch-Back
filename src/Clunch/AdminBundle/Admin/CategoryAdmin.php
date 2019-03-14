<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_categories';

    protected $baseRoutePattern = 'categories';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label'    => 'Nom de la catégorie'
            ))
            ->add('slug')
            ->add('description', null, array(
                'label'   => 'Description de la catégorie'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nom de la catégorie'))
            ->add('slug')
            ->add('description', null, array('label' => 'Description de la catégorie'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('name', null, array('label' => 'Nom de la catégorie'))
            ->add('slug')
            ->add('description', null, array('label' => 'Description de la catégorie'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }
}
