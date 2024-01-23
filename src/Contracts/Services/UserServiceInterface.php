<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
use ReflectionException;

interface UserServiceInterface
{
    /**
     * In order to enable login via login OR email, we need to be sure the found user is the right one.
     * In the database model the field email of a user is not unique!
     * Solution is first look for user with incoming string as login.
     * If no one was found, looking for user with incoming string as email.
     * In case of more than one user was found, login will fail.
     *
     * @param string $loginOrEmail - The incoming email address or login, which we need to find a distinct user
     *
     * @return UserInterface|false - User in case of a distinct user entry was found, otherwise false
     *
     * @throws ReflectionException
     */
    public function findDistinctUserByEmailOrLogin($loginOrEmail);
}
