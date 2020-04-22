<?php

namespace App\Admin;

use App\Entity\Specialisation;
use App\Entity\UserType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cnp', TextType::class)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('fatherInitial', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TextType::class)
            ->add('password', PasswordType::class)
            ->add('totalCredits', IntegerType::class)
            ->add('studentStatus', ChoiceType::class, [
                'choices' => [
                    'bugetar' => 'bugetar',
                    'fara taxa' => 'fara taxa',
                    'studii finalizate' => 'studii finalizate'
                ],
                'required' => false
            ])
            ->add('type', ModelType::class, [
                'class' => UserType::class,
                'property' => 'name',
                'required' => true
            ])
            ->add('specialisation', ModelType::class, [
                'class' => Specialisation::class,
                'property' => 'name',
                'multiple' => true,
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('cnp')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('studentStatus')
            ->add('type', null, [], EntityType::class, [
                'class' => UserType::class,
                'choice_label' => 'name'
            ])
            ->add('specialisation', null, [], EntityType::class, [
                'class' => Specialisation::class,
                'choice_label' => 'name'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('cnp')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('studentStatus')
            ->add('phone')
            ->add('totalCredits')
            ->add('type', UserType::class, [
                'associated_property' => 'name'
            ])
            ->add('specialisation', Specialisation::class, [
                'associated_property' => 'name',
                'sort_field_mapping' => [
                    'fieldName' => 'id',
                ],
            ])
        ;
    }
}