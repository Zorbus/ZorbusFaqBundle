<?php

namespace Zorbus\FaqBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ItemAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('faq', null, array('required' => true, 'attr' => array('class' => 'span5 select2')))
                ->add('question', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                ->add('answer', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                ->add('imageTemp', 'file', array('required' => false, 'label' => 'Image'))
                ->add('position')
                ->add('enabled', null, array('required' => false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('question')
                ->add('faq')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('question')
                ->addIdentifier('faq')
                ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
                ->with('faq')
                ->assertNotBlank()
                ->end()
                ->with('question')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
                ->end()
                ->with('answer')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
                ->end()
        ;
    }

    public function prePersist($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

    public function preUpdate($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

}