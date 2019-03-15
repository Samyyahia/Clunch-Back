<?php

namespace Clunch\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_clunch_users';

    protected $baseRoutePattern = 'users';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', null, array(
                'label'    => 'Nom d\'utilisateur'
            ))
            ->add('email')
            ->add('picture', 'sonata_type_model_list', array(
                'label'   => 'Image de Profil',
            ), array(
                'link_parameters' => array(
                    'context' => 'default'
                )
            ))
            ->add('desc', null, array(
                'label'   => 'Description du Profil'
            ))
            ->add('allergy', 'sonata_type_model', array(
                'multiple'     => true,
                'property'     => 'title',
                'sortable'     => true,
                'by_reference' => false,
                'label'        => 'Allergies de l\'utilisateur'
            ))
            ->add('enabled', CheckboxType::class, array(
                'required' => false,
                'label'    => 'Activer',
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username', null, array('label' => 'Nom d\'utilisateur'))
            ->add('email', null, array('label' => 'Email'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('username', null, array('label' => 'Nom d\'utilisateur'))
            ->add('email')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                )
            ));
    }

    public function createQuery($context = 'list')
    {
        $role = 'ROLE_USER';
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->like($query->getRootAliases()[0] . '.roles', ':role')
        );
        $query->setParameter('role', '%'.$role.'%');

        return $query;
    }
}
