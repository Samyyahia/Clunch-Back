<?php
namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;


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
              ->add('date', null, array('label' => 'Date'));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
              ->add('recipe', null, array('label' => 'Plat'))
              ->add('description', null, array('label' => 'Description'))
              ->add('quantity', null, array('label' => 'Quantité'))
              ->add('date', null, array('label' => 'Date'));
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    unset($this->listModes['mosaic']);

    $listMapper
              ->add('recipe', null, array('label' => 'Plat'))
              ->add('description', null, array('label' => 'Description'))
              ->add('quantity', null, array('label' => 'Quantité'))
              ->add('date', null, array('label' => 'Date'))
              ->add('_action', 'actions', array(
                'actions' => array(
                  'edit' => array(),
                )
              ));
  }

  protected function getUsers($role = null)
  {
    $em = $this->modelManager->getEntityManager(User::class);

    $query = $em->createQueryBuilder('u')
                ->select('u')
                ->from(User::class, 'u')
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%'.$role.'%');

    return $query;
  }
}
