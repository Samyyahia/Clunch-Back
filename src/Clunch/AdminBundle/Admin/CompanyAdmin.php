<?php
namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class CompanyAdmin extends AbstractAdmin
{
  protected $baseRouteName = 'admin_clunch_company';

  protected $baseRoutePattern = 'company';

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
              ->add('name', null, array('label' => 'Nom de l\'entreprise'))
              ->add('token', null, array('label' => 'Token d\'accès'))
              ->add('users', 'sonata_type_model', array(
                'multiple' => true,
                'by_reference' => false,
              ));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
              ->add('name', null, array('label' => 'Nom de l\'entreprise'))
              ->add('token', null, array('label' => 'Token d\'accès'));
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    unset($this->listModes['mosaic']);

    $listMapper
              ->addIdentifier('name', null, array('label' => 'Nom de l\'entreprise'))
              ->add('token', null, array('label' => 'Token d\'accès'))
              ->add('_action', 'actions', array(
                'actions' => array(
                  'edit' => array(),
                )
              ));
  }
}
