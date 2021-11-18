<?php

namespace App\Form;

use App\Entity\Prueba;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PruebagusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('campoString', TextType::class, ['label' => "Campo string",'required' => true,'attr' => ['class' => "form-control"]])
            ->add('campoInteger', IntegerType::class, ['label' => "Campo Integer",'required' => true,'attr' => ['class' => "form-control"]])
            ->add('campoEmail', EmailType::class, ['label' => "Campo E-mail",'required' => true,'attr' => ['class' => "form-control"]])
        ;
    }    
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prueba::class,
        ]);
    }
}
