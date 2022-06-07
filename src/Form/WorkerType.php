<?php

namespace App\Form;

use App\Entity\Worker;
use App\Form\DataTransformer\BayToStringTransformer;
use App\Form\DataTransformer\TypeOfWorkToStringTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorkerType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('WorkerFirstName')
            ->add('WorkerMiddleName')
            ->add('WorkerLastName')
            ->add('WorkerPhone')
            ->add('Bay', TextType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ))
            ->add('TypeOfWork', HiddenType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ))
        ;

        $builder->get('Bay')->addModelTransformer(new BayToStringTransformer($this->em));
        $builder->get('TypeOfWork')->addModelTransformer(new TypeOfWorkToStringTransformer($this->em));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Worker::class,
        ]);
    }
}
