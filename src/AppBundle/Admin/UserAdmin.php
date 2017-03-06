<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        //$formMapper->add('recipient', 'fos_user_username');

        $roles = array();

        foreach ($this->getConfigurationPool()->getContainer()->getParameter('security.role_hierarchy.roles') as $name => $rolesHierarchy) {
            $roles[$name] = $name;

            foreach ($rolesHierarchy as $role) {
                if (!isset($roles[$role])) {
                    $roles[$role] = $role;
                }
            }
        }

        $formMapper
            ->add('username')
            ->add('email', 'email')
            ->add('roles', 'choice', array('choices' => $roles, 'multiple' => true))
            ->add('plainPassword', 'password')
            ->add('enabled')
        ;
        //$formMapper->add('name', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username');
    }
}