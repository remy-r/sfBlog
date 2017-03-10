<?php
namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre')
            ->add('postText', CKEditorType::class, array('label' => "Texte"))
            ->add('postState', 'sonata_type_model', array(
                'required' => true,
                'class' => 'AppBundle\Entity\PostState',
                'property' => 'libelle',
                'btn_add' => false
            ))
            ->add('user', 'sonata_type_model_autocomplete', array(
                'required' => true,
                'class' => 'AppBundle\Entity\FosUser',
                'property' => 'username',
            ))
        ;
        //$formMapper->add('name', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('titre');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('titre');
    }

    public function toString($object)
    {
        return $object->getTitre();
    }

}