<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use App\Entity\Tax;
use App\Entity\User;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

final class UserTaxAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('tax', ModelType::class, [
                'class' => Tax::class,
                'property' => 'name'
            ])
            ->add('createdAt', DateTimeType::class)
            ->add('paymentDate', DateTimeType::class)
            ->add('user', ModelType::class, [
                'class' => User::class,
                'property' => 'email'
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('createdAt')
            ->add('paymentDate')
            ->add('tax', null, [], EntityType::class, [
                'class' => Tax::class,
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
            ->add('tax', Tax::class, [
                'associated_property' => 'name'
            ])
            ->add('createdAt')
            ->add('paymentDate')
            ->add('user', User::class, [
                'associated_property' => 'email'
            ])
        ;
    }
}