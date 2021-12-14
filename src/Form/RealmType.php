<?php

namespace App\Form;

use App\Entity\Realm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RealmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('realm', TextType::class, [
                'label' => 'Nombre del Realm',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Realm',
                ],
            ])
            //->add('idRealmKeycloak')
            //->add('keycloakRealmId')
            //->add('fechaEliminacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Realm::class,
        ]);
    }
}
