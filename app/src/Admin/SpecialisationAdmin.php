<?php

namespace App\Admin;

use App\Entity\Faculty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class SpecialisationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class)
            ->add('year', TextType::class)
            ->add('taxAmount', NumberType::class)
            ->add('creditAmount', NumberType::class)
            ->add('discount', NumberType::class)
            ->add('faculty', ModelType::class, [
                'class' => Faculty::class,
                'property' => 'name'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('year')
            ->add('taxAmount')
            ->add('creditAmount')
            ->add('discount')
            ->add('faculty', null, [], EntityType::class, [
                'class' => Faculty::class,
                'choice_label' => 'name'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('year')
            ->add('taxAmount')
            ->add('creditAmount')
            ->add('discount')
            ->add('faculty', Faculty::class, [
                'associated_property' => 'name'
            ])
        ;
    }
}