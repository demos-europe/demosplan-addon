<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Ramsey\Uuid\Uuid;

class UuidV4Generator extends AbstractIdGenerator
{
    public function generateId(EntityManagerInterface $em, $entity): string
    {
        return Uuid::uuid4()->toString();
    }
}