<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AllergyAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_allergies';

    protected $baseRoutePattern = 'allergies';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array(
                'label'    => 'Nom de l\'allergie'
            ))
            ->add('description', null, array(
                'label'   => 'Description de l\'allergie'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Nom de l\'allergie'))
            ->add('description', null, array('label' => 'Description de l\'allergie'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('title', null, array('label' => 'Nom de l\'allergie'))
            ->add('description', null, array('label' => 'Description de l\'allergie'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }
}
