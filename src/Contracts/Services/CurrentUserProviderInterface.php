<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;


use Symfony\Component\Security\Core\User\UserInterface;

interface CurrentUserProviderInterface
{
    /**
     * @return UserInterface
     */
    public function getUser();
}
