<?php

namespace App\Form\DataTransformer;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class ClientToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  Client|null $client
     * @return строку
     */
    public function transform($client): string
    {
        if (null === $client) {
            return '';
        }

        return $client->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $clientNumber
     * @return Client|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($clientNumber): ?Client
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$clientNumber) {
            return null;
        }

        $client = $this->em
            ->getRepository(Client::class)
            // запрос проблемы по этому id
            ->find($clientNumber)
        ;

        if (null === $client) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $clientNumber
            ));
        }

        return $client;
    }

}