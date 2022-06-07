<?php

namespace App\Form;

use App\Entity\Custom;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\DataTransformer\ClientToStringTransformer;

class CustomType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CarInformation')
            ->add('OrderDate')
            ->add('OrderEndDate')
            ->add('OrderPayDate')
            ->add('Client', TextType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ));

        $builder->get('Client')->addModelTransformer(new ClientToStringTransformer($this->em));

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Custom::class,
            'client_id' => 0,
        ]);
    }
}
