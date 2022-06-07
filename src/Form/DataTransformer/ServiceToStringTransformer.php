<?php

namespace App\Form\DataTransformer;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class ServiceToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  Service|null $service
     * @return строку
     */
    public function transform($service): string
    {
        if (null === $service) {
            return '';
        }

        return $service->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $serviceNumber
     * @return Service|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($serviceNumber): ?Service
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$serviceNumber) {
            return null;
        }

        $service = $this->em
            ->getRepository(Service::class)
            // запрос проблемы по этому id
            ->find($serviceNumber)
        ;

        if (null === $service) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $serviceNumber
            ));
        }

        return $service;
    }
}