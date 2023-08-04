<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts;

use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

interface UserHandlerInterface
{
    public function getFirstUserInFhhnetByLogin(string $login): UserInterface;
    public function getSingleUser($userId): ?UserInterface;
}
