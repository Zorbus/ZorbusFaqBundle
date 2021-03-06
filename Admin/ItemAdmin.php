<?php

namespace Zorbus\FaqBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class ItemAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('faq', null, array(
                    'required' => true,
                    'attr' => array('class' => 'span5 select2'),
                    'constraints' => array(
                        new NotBlank(),
                        new Type(array('type' => 'Zorbus\FaqBundle\Entity\Faq'))
                    )
                 ))
                ->add('question', 'textarea', array(
                    'required' => false,
                    'attr' => array('class' => 'ckeditor'),
                    'constraints' => array(
                        new NotBlank()
                    )
                 ))
                ->add('answer', 'textarea', array(
                    'required' => false,
                    'attr' => array('class' => 'ckeditor'),
                    'constraints' => array(
                        new NotBlank()
                    )
                ))
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
                ->addIdentifier('question', 'text')
                ->addIdentifier('faq', 'text')
                ->add('enabled')
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