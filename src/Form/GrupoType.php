<?php

namespace App\Form;

use App\Entity\Grupo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrupoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('KeycloakGroupId')
            ->add('nombre')
            ->add('realm')
            //->add('usuarios')
            //->add('tipoDispositivo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Grupo::class,
        ]);
    }
}
