<?php

namespace App\Form;

use App\Entity\Menuitem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuitemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            #->add('rolecompany')
            ->add('name')
            #->add('nametree')
            #->add('icon')
            ->add('link')
            #->add('active')
            ->add('orderlist1')
            ->add('orderlist')
            #->add('typeId')
            #->add('availablesel')
            #->add('module')
            #->add('action')
            #->add('divider')
            #->add('fechaEliminacion')
            ->add('menuId')
            ->add('parent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menuitem::class,
        ]);
    }
}
