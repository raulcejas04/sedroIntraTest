<?php

namespace App\Form;

use App\Entity\Solicitud;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Entity\TipoDispositivo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NuevaSolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cuit', TextType::class, [
                'label' => "CUIT Persona Jurídica",
                'required' => true,
                'attr' => [
                    'class' => "val-cuit"
                ]
            ])
            ->add('cuil', TextType::class, [
                'label' => "CUIL Persona Física",
                'required' => true,
                'attr' => [
                    'class' => "val-cuit"
                ]
            ])
            ->add('nicname', TextType::class, [
                'label' => "Nombre corto de dispositivo",
                'required' => true,
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('tipoDispositivo', EntityType::class, [
                'class' => TipoDispositivo::class,
                'mapped' => false,
                'label' => "Tipo de dispositivo",
                'required' => true,
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('mail', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => 'Los emails deben ser iguales',
                'options' => ['attr' => ['class' => 'form-control val-email']],
                'required' => true,
                'first_options'  => ['label' => 'E-mail'],
                'second_options' => ['label' => 'Repita E-mail'],
            ])
            ->addEventListener(
                FormEvents::POST_SUBMIT,
                [$this, 'onPostSubmit']
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Solicitud::class,
        ]);
    }
    
    public function onPostSubmit(FormEvent $event): void
    {
        $sol = $event->getData();
        $form = $event->getForm();
	$sol->setCuit(str_replace('-','',$sol->getCuit()));
	$sol->setCuil(str_replace('-','',$sol->getCuil()));
	
	$event->setData($sol);
    }
}
