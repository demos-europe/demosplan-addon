<?php

/**
 * This file is part of the package demosplan.
 *
 * (c) 2010-present DEMOS plan GmbH, for more information see the license file.
 *
 * All rights reserved
 */

namespace DemosEurope\DemosplanAddon\Contracts\Repositories;

use DemosEurope\DemosplanAddon\Contracts\Entities\CustomerInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;

/**
 * Interface for User repository operations.
 * Extracted from UserRepository to provide a contract for user data access.
 */
interface UserRepositoryInterface
{
    /**
     * Get Entity by Id.
     *
     * @param string $userId the user ID as UUID v4
     *
     * @return UserInterface|null
     */
    public function getUser(string $userId): ?UserInterface;

    /**
     * Add Entity to database.
     *
     * @param array $data User data array
     *
     * @return UserInterface
     *
     * @throws \Exception
     */
    public function createUser(array $data): UserInterface;

    /**
     * Update Entity.
     *
     * @param string $userId
     * @param array $data
     *
     * @return UserInterface|null
     *
     * @throws \Exception
     */
    public function updateUser(string $userId, array $data): ?UserInterface;

    /**
     * Update user object directly.
     *
     * @param UserInterface $entity
     *
     * @return UserInterface
     *
     * @throws \Exception
     */
    public function updateUserObject(UserInterface $entity): UserInterface;

    /**
     * Get users with pagination and optional criteria filtering.
     *
     * @param int   $startIndex Starting index (1-based)
     * @param int   $count      Number of users to return
     * @param array $criteria   Optional filtering criteria
     *
     * @return array Array containing users and pagination info
     */
    public function getUsers(int $startIndex, int $count, array $criteria = []): array;

    /**
     * Get Users by role code.
     *
     * @param string   $code     Role code
     * @param CustomerInterface $customer Customer context
     *
     * @return UserInterface[]
     */
    public function getUsersByRole(string $code, CustomerInterface $customer): array;

    /**
     * Get user by login (case-insensitive).
     *
     * @param string $login User login
     *
     * @return UserInterface|null
     */
    public function getUserByLogin(string $login): ?UserInterface;

    /**
     * Overrides all relevant data field of the given user with default values, to remove any sensible data.
     *
     * @param string $userId
     *
     * @return UserInterface|bool
     */
    public function wipe(string $userId): UserInterface|bool;
}
