<?php

namespace App\Form;

use App\Entity\Custom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CarInformation')
            ->add('OrderDate')
            ->add('OrderEndDate')
            ->add('OrderPayDate')
            ->add('Client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Custom::class,
        ]);
    }
}
