<?php

namespace App\Form\DataTransformer;

use App\Entity\Custom;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CustomToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  Custom|null $custom
     * @return строку
     */
    public function transform($custom): string
    {
        if (null === $custom) {
            return '';
        }

        return $custom->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $customNumber
     * @return Custom|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($customNumber): ?Custom
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$customNumber) {
            return null;
        }

        $custom = $this->em
            ->getRepository(Custom::class)
            // запрос проблемы по этому id
            ->find($customNumber)
        ;

        if (null === $custom) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $customNumber
            ));
        }

        return $custom;
    }

}