<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Handler;

use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use demosplan\DemosPlanCoreBundle\Entity\Statement\Statement;
use demosplan\DemosPlanCoreBundle\Exception\MessageBagException;
use Tightenco\Collect\Support\Collection;

interface StatementHandlerInterface
{
    /**
     * Concatenate the text of the given text and the boilerplate-texts of the given tags.
     *
     * @param string[]|Collection $tagIds IDs of Tags which boilerplates will be concatenated
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
}
