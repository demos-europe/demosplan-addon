<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Handler;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;

interface StatementHandlerInterface
{
    /**
     * Concatenate the text of the given text and the boilerplate-texts of the given tags.
     *
     * @param iterable<string> $tagIds IDs of Tags which boilerplates will be concatenated
     * @param string              $considerationText
     *
     * @return string concatenated boilerplates
     */
    public function addBoilerplatesOfTags($tagIds, $considerationText = ''): string;

    /**
     * Save new manual statement
     *
     * Statements submitted the usual way will be copied, not re-created.
     *
     * @return StatementInterface|bool
     */
    public function newStatement(array $data, bool $isDataInput = false);

    /**
     * Get Statement by Id.
     *
     * @param string $id
     */
    public function getStatement($id): ?StatementInterface;

    /**
     * Definitely get Statement by Id.
     * ToImprove: I would prefer to rename "$this->getStatement()" to "$this->getStatementOrNull()", so that this method
     *            could only be named "getStatement", but that would be a larger refactoring. This is a first step on
     *            that path making the change easy.
     */
    public function getStatementWithCertainty(string $statementId): StatementInterface;
}
