<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EventAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_event';

    protected $baseRoutePattern = 'event';

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('recipe', null, array('label' => 'Plat'))
            ->add('description', null, array('label' => 'Description'))
            ->add('quantity', null, array('label' => 'Quantité'))
            ->add('date', DateType::class, array(
                'label' => 'Date',
                'widget' => 'single_text'
            ))
            ->add('limitDate', DateType::class, array(
                'label' => 'Date limite d\'inscription à l\'évenement',
                'widget' => 'single_text'
            ))
            ->add('user', ModelListType::class, array(
                'by_reference' => false,
                'label' => 'Utilisateur'
            ))
            ->add('participants');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('recipe', null, array('label' => 'Plat'))
            ->add('description', null, array('label' => 'Description'))
            ->add('quantity', null, array('label' => 'Quantité'))
            ->add('date', null, array('label' => 'Date'))
            ->add('user', null, array('label' => 'Utilisateur'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->add('recipe', null, array('label' => 'Plat'))
            ->add('description', null, array('label' => 'Description'))
            ->add('quantity', null, array('label' => 'Quantité'))
            ->add('date', null, array('label' => 'Date'))
            ->add('user', null, array('label' => 'Utilisateur'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }
}
