<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DateTime;
use DemosEurope\DemosplanAddon\Contracts\ApiRequest\ApiPaginationInterface;
use EDT\Querying\Contracts\PathsBasedInterface;
use Pagerfanta\Pagerfanta;

interface JsonApiResourceTypeServiceInterface
{
    public function getInternalProperties(JsonApiResourceTypeInterface $type, array $autoPathProperties): array;

    public function toProperties(array $propertyPaths): array;

    public function listEntities(JsonApiResourceTypeInterface $type, array $conditions, array $sortMethods): array;

    public function getEntityPaginator(JsonApiResourceTypeInterface $type, ApiPaginationInterface $pagination, array $conditions, array $sortMethods): Pagerfanta;

    public function listPrefilteredEntities(JsonApiResourceTypeInterface $type, array $dataObjects, array $conditions, array $sortMethods): array;

    public function getEntityCount(JsonApiResourceTypeInterface $type, array $conditions): int;

    public function getEntityByTypeIdentifier(JsonApiResourceTypeInterface $type, string $id): object;

    public function listEntityIdentifiers(JsonApiResourceTypeInterface $type, array $conditions, array $sortMethods): array;

    public function getAccessCondition(JsonApiResourceTypeInterface $type): PathsBasedInterface;

    public function formatDate(?DateTime $date): ?string;

    public function processProperties(JsonApiResourceTypeInterface $type, array $properties): array;

    public function getEntityAsReadTarget(JsonApiResourceTypeInterface $type, string $id): object;

    public function isExposedAsRelationship(JsonApiResourceTypeInterface $type): bool;

    public function isExposedAsPrimaryResource(JsonApiResourceTypeInterface $type): bool;

    public function addCreationErrorMessage(array $parameters): void;
}
