<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use Doctrine\Common\Collections\Collection;
use DateTime;

interface SurveyInterface extends UuidEntityInterface, CoreEntityInterface
{
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CONFIGURATION = 'configuration';
    public const STATUS_EVALUATION = 'evaluation';
    public const STATUS_PARTICIPATION = 'participation';

    public function setId(string $id): void;

    public function getTitle(): string;

    public function setTitle(string $title): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getStartDate(): DateTime;

    public function setStartDate(DateTime $startDate): void;

    public function getEndDate(): DateTime;

    public function setEndDate(DateTime $endDate): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function getProcedure(): ProcedureInterface;

    public function setProcedure(ProcedureInterface $procedure): void;

    public function getVotes(): Collection;

    /**
     * Returns Survey Vote with given id or null if it doesn't exist.
     *
     * @param string $voteId
     */
    public function getVote($voteId): ?SurveyVoteInterface;

    public function addVote(SurveyVoteInterface $vote): void;

    public function getPositiveVotes(): Collection;

    public function getNegativeVotes(): Collection;

    public function getReviewRequiredVotes(): Collection;
}
