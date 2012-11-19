<?php
namespace Zorbus\FaqBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Validator\Constraints\NotBlank;

class FaqAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('description', 'textarea', array(
                'required' => false,
                'attr' => array('class' => 'ckeditor')
            ))
            ->add('lang', 'language', array(
                'preferred_choices' => array('en', 'pt_PT')
            ))
            ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('enabled')
        ;
    }
    public function configureShowFields(ShowMapper $filter)
    {
        $filter
            ->add('title')
            ->add('description')
            ->add('lang')
            ->add('enabled')
        ;
    }
}