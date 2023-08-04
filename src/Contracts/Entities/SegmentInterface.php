<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

interface SegmentInterface extends StatementInterface
{
    public const VALIDATION_GROUP_SEGMENT_MANDATORY = 'segment_mandatory';

    public const VALIDATION_GROUP_DEFAULT = 'segment_default';

    public const VALIDATION_GROUP_IMPORT = 'segment_import';

    public const RECOMMENDATION_FIELD_NAME = 'recommendation';

    public function getParentStatementOfSegment(): StatementInterface;

    public function getParentStatement(): StatementInterface;

    public function setParentStatementOfSegment(StatementInterface $parentStatementOfSegment): void;

    public function isSegment(): bool;

    public function getOrderInProcedure(): int;

    public function setOrderInProcedure(int $orderInProcedure): void;

    public function setPlace(PlaceInterface $place): self;

    public function getPlace(): PlaceInterface;

    /**
     * Needed for elasticsearch indexing.
     */
    public function getPlaceId(): string;

    public function addComment(SegmentCommentInterface $comment): self;

}