<?php

namespace App\Form\DataTransformer;

use App\Entity\Worker;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class WorkerToStringTransformer implements \Symfony\Component\Form\DataTransformerInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Трансформирует объект (Клиент) в строку.
     *
     * @param  Worker|null $worker
     * @return строку
     */
    public function transform($worker): string
    {
        if (null === $worker) {
            return '';
        }

        return $worker->getId();
    }

    /**
     * Трансформирует строку (число) в объект (Клиент).
     *
     * @param  string $workerNumber
     * @return Worker|null
     * @throws TransformationFailedException if object (client) is not found.
     */
    public function reverseTransform($workerNumber): ?Worker
    {
        // нет номера проблемы? Это необязательно, так что всё хорошо
        if (!$workerNumber) {
            return null;
        }

        $worker = $this->em
            ->getRepository(Worker::class)
            // запрос проблемы по этому id
            ->find($workerNumber)
        ;

        if (null === $worker) {
            // вызывает ошибку валидации
            // это сообщение не отображается пользователю
            // смотрите опцию invalid_message
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $workerNumber
            ));
        }

        return $worker;
    }
}