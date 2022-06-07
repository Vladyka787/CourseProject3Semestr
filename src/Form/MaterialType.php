<?php

namespace App\Form;

use App\Entity\Material;
use App\Form\DataTransformer\ServiceToStringTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MaterialType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('MaterialName')
            ->add('MaterialPrice')
            ->add('MaterialDescription')
            ->add('MaterialAmount')
            ->add('MaterialMeasure')
            ->add('Service', TextType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ));

        $builder->get('Service')->addModelTransformer(new ServiceToStringTransformer($this->em));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Material::class,
            'service_id' =>0,
        ]);
    }
}
