<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;

/**
 * Even simple tasks to be executed in the backend -- e.g. updating an entity field value or
 * deleting or creating an entity -- may affect more than one entity due to (potentially
 * bidirectional) relationships and side effects. Other tasks, e.g. bulk edits, affect multiple
 * entities by their very nature.
 *
 * {@link ResourceChange} instances can be used to collect entity instances that were affected by
 * an executed task, to update the database and search index accordingly in a single go. Executing
 * the actual database/search index update is not done via this class. It is merely a collector of
 * the entities that were affected and provides getters to retrieve those.
 *
 * Instances can be passed around at leisure when and where they are deemed useful. E.g. via
 * method parameters, returns or via events to add entities in plugins.
 */
interface EntityChangeInterface
{
    /**
     * Add an entity instance that should be persisted via Doctrine before flushing.
     *
     * Please note that it is **not necessary** to use this method if your entity instance is
     * already managed by Doctrine (i.e. fetched via Doctrine from the database). Changes to
     * already persisted entities will be flushed into the database without the need to add the
     * entity instance to the {@link EntityChangeInterface} instance.
     */
    public function addEntityToPersist(EntityInterface $entity): void;

    /**
     * Add multiple entity instances that should be persisted via Doctrine before flushing.
     *
     * Please note that it is **not necessary** to use this method if your entity instance is
     * already managed by Doctrine (i.e. fetched via Doctrine from the database). Changes to
     * already persisted entities will be flushed into the database without the need to add the
     * entity instances to the {@link EntityChangeInterface} instance.
     *
     * @param array<int, EntityInterface> $entities
     */
    public function addEntitiesToPersist(array $entities): void;

    /**
     * @return array<int,EntityInterface>
     */
    public function getEntitiesToPersist(): array;

    public function addEntityToDelete(EntityInterface $entity): void;

    /**
     * @return array<int,EntityInterface>
     */
    public function getEntitiesToDelete(): array;
}

