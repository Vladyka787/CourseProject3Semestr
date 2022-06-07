<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\Bay;
use App\Entity\TypeOfWork;
use App\Entity\Worker;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\DataTransformer\CustomToStringTransformer;
use App\Form\DataTransformer\BayToStringTransformer;
use App\Form\DataTransformer\TypeOfWorkToStringTransformer;
use App\Form\DataTransformer\WorkerToStringTransformer;

class ServiceType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ServiceDescription')
            ->add('ServicePrice')
            ->add('ServiceCompleteDate')
            ->add('Custom', TextType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ))
            ->add('Bay', HiddenType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ))
            ->add('TypeOfWork', TextType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ))
            ->add('Worker', HiddenType::class, array(
                // сообщение валидации при ошибке преобразователя данных
                'invalid_message' => 'That is not a valid issue number',
            ));

        $builder->get('Custom')->addModelTransformer(new CustomToStringTransformer($this->em));
        $builder->get('Bay')->addModelTransformer(new BayToStringTransformer($this->em));
        $builder->get('TypeOfWork')->addModelTransformer(new TypeOfWorkToStringTransformer($this->em));
        $builder->get('Worker')->addModelTransformer(new WorkerToStringTransformer($this->em));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
