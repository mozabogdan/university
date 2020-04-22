<?php

namespace App\Admin;

use App\Entity\Specialisation;
use App\Entity\TaxType;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class TaxAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class)
            ->add('amount', NumberType::class)
            ->add('penalty', NumberType::class)
            ->add('discount', NumberType::class)
            ->add('type', ModelType::class, [
                'class' => TaxType::class,
                'property' => 'name'
            ])
            ->add('specialisation', ModelType::class, [
                'class' => Specialisation::class,
                'property' => 'name'
            ])
            ->add('user', ModelType::class, [
                'class' => User::class,
                'property' => 'email'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('amount')
            ->add('penalty')
            ->add('discount')
            ->add('specialisation', null, [], EntityType::class, [
                'class' => Specialisation::class,
                'choice_label' => 'name'
            ])
            ->add('type', null, [], EntityType::class, [
                'class' => TaxType::class,
                'choice_label' => 'name'
            ])
            ->add('user', null, [], EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('amount')
            ->add('penalty')
            ->add('discount')
            ->add('type', TaxType::class, [
                'associated_property'   => 'name'
            ])
            ->add('specialisation', Specialisation::class, [
                'associated_property'   => 'name'
            ])
            ->add('user', User::class, [
                'associated_property'   => 'email'
            ])
        ;
    }
}