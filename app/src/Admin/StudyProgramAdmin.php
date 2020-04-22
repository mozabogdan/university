<?php

namespace App\Admin;

use App\Entity\Faculty;
use App\Entity\Specialisation;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class StudyProgramAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class)
            ->add('semesterNumber', NumberType::class)
            ->add('creditNumber', NumberType::class)
            ->add('faculty', ModelType::class, [
                'class' => Faculty::class,
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
            ->add('creditNumber')
            ->add('semesterNumber')
            ->add('specialisation', null, [], EntityType::class, [
                'class' => Specialisation::class,
                'choice_label' => 'name'
            ])
            ->add('faculty', null, [], EntityType::class, [
                'class' => Faculty::class,
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
            ->add('semesterNumber')
            ->add('faculty', Faculty::class, [
                'associated_property' => 'name'
            ])
            ->add('user', User::class, [
                'associated_property' => 'email'
            ])
            ->add('specialisation', Specialisation::class, [
                'associated_property' => 'name'
            ])
        ;
    }
}