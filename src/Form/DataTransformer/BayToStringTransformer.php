<?php

namespace App\Form\DataTransformer;

use App\Entity\Bay;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class BayToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  Bay|null $bay
     * @return строку
     */
    public function transform($bay): string
    {
        if (null === $bay) {
            return '';
        }

        return $bay->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $bayNumber
     * @return Bay|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($bayNumber): ?Bay
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$bayNumber) {
            return null;
        }

        $bay = $this->em
            ->getRepository(Bay::class)
            // запрос проблемы по этому id
            ->find($bayNumber)
        ;

        if (null === $bay) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $bayNumber
            ));
        }

        return $bay;
    }
}