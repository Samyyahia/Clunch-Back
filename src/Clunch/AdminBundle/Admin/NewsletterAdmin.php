<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class NewsletterAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_newsletter';

    protected $baseRoutePattern = 'newsletter';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('mail', null, array(
                'label'    => 'E-mail'
            ))
            ->add('phone', null, array(
                'label'   => 'Téléphone'
            ))
            ->add('agreement', null, array(
                'label'   => 'Accord'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('mail', null, array('label' => 'E-mail'))
            ->add('phone', null, array('label' => 'Téléphone'))
            ->add('agreement', null, array('label' => 'Accord'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('mail', null, array('label' => 'E-mail'))
            ->add('phone', null, array('label' => 'Téléphone'))
            ->add('agreement', null, array('label' => 'Accord'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
}
