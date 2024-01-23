<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Exceptions;

class AddonUserNotFoundException extends AddonResourceNotFoundException
{
    /**
     * @var string|null
     */
    private $userLogin;

    public static function createFromId(string $userId): self
    {
        return new self("Could not find User with ID {$userId}");
    }

    public static function createFromLogin(string $login): self
    {
        $self = new self("Could not find User with Login {$login}");
        $self->userLogin = $login;

        return $self;
    }

    public function getUserLogin(): ?string
    {
        return $this->userLogin;
    }
}
