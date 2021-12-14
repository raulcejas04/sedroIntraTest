<?php

namespace App\Form;

use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyId')
            ->add('code')
            ->add('name')
            ->add('active')
            ->add('createdby')
            ->add('createdat')
            ->add('updatedby')
            ->add('updatedat')
            ->add('deletedby')
            ->add('deletedat')
            ->add('orderlist')
            ->add('keycloakRoleId')
            ->add('fechaEliminacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Role::class,
        ]);
    }
}
