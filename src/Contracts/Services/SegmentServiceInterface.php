<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Services;

use DateTime;
use DemosEurope\DemosplanAddon\Contracts\Entities\ProcedureInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\SegmentInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\UserInterface;
use DemosEurope\DemosplanAddon\Contracts\Exceptions\ViolationsExceptionInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

interface SegmentServiceInterface extends CoreServiceInterface
{
    /**
     * @return array<SegmentInterface>
     */
    public function findByProcedure(ProcedureInterface $procedure): array;

    /**
     * @return array<SegmentInterface>
     */
    public function findAll(): array;

    /**
     * Creates {@link EntityContentChange} entries for the given {@link SegmentInterface} entities and
     * persists them in the database. By default, both entity types will be flushed into the
     * database.
     *
     * When flushing it is expected that the {@link SegmentInterface} entities are already managed by
     * Doctrine. I.e. fetched from Doctrine or manually added to Doctrines context via persist.
     *
     * Please note that this method is used for {@link SegmentInterface} bulk edits, meaning performance
     * is of relevance.
     *
     * @param array<int, SegmentInterface> $segments
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function prepareAndSaveWithContentChange(array $segments, DateTime $updateTime): void;

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws ViolationsExceptionInterface
     */
    public function addSegments(array $segments): void;

    /**
     * @param array<int, SegmentInterface> $segments
     *
     * @throws ORMException
     *
     * @see SegmentRepository::editSegmentRecommendations
     */
    public function editSegmentRecommendations(
        array $segments,
        string $procedureId,
        string $recommendationText,
        bool $attach,
        UserInterface $user,
        string $entityType,
        DateTime $updateTime
    ): void;

    /**
     * @param array<int, string> $ids
     *
     * @return array<int, SegmentInterface>
     */
    public function findByIds(array $ids): array;

    /**
     * @return array<int, SegmentInterface>
     */
    public function findByParentStatementId(string $statementId): array;

    public function getNextSegmentOrderNumber($procedureId): int;

    /**
     * @throws EntityNotFoundException
     */
    public function findByIdWithCertainty(string $id): SegmentInterface;


}
