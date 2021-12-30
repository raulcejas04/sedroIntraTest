<?php

namespace App\Form;

use App\Entity\IssueReport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IssueReportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo', TextType::class, [
                'label' => 'Título',
                'attr' => [
                    'placeholder' => 'Título',
                    'class' => 'form-control',
                ],
            ])
            ->add('issue', null, [
                'label' => 'Problema',
                'attr' => [
                    'placeholder' => 'Describa el problema que presenta',
                    'class' => 'form-control',
                    'rows' => "4",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => IssueReport::class,
        ]);
    }
}
