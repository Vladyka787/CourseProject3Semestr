<?php

namespace App\Form\DataTransformer;

use App\Entity\TypeOfWork;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TypeOfWorkToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  TypeOfWork|null $typeOfWork
     * @return строку
     */
    public function transform($typeOfWork): string
    {
        if (null === $typeOfWork) {
            return '';
        }

        return $typeOfWork->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $typeOfWorkNumber
     * @return TypeOfWork|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($typeOfWorkNumber): ?TypeOfWork
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$typeOfWorkNumber) {
            return null;
        }

        $typeOfWork = $this->em
            ->getRepository(TypeOfWork::class)
            // запрос проблемы по этому id
            ->find($typeOfWorkNumber)
        ;

        if (null === $typeOfWork) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $typeOfWorkNumber
            ));
        }

        return $typeOfWork;
    }
}