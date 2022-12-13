<?php

namespace DemosEurope\DemosplanAddon\Logic;

use DemosEurope\DemosplanAddon\Contracts\CurrentUserInterface;
use DemosEurope\DemosplanAddon\Contracts\Entities\StatementInterface;
use DemosEurope\DemosplanAddon\Contracts\Handler\StatementHandlerInterface;
use DemosEurope\DemosplanAddon\Contracts\MessageBagInterface;
use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

/**
 * Takes care of actions related to creating the simplified version of a Statement.
 * Delegates the details depending on the origin of the info to its specific implementations.
 */
abstract class SimplifiedStatementCreator
{
    public const PROCEDURE_DATA_INPUT = 'RDATA';
    // Possible keys for values needed by the implementations of this class
    protected const PARAM_PROCEDURE_ID = 'procedureId';
    protected const PARAM_STATEMENT = 'statement';

    /** @var StatementHandlerInterface */
    protected $statementHandler;

    /** @var CurrentUserInterface */
    protected $currentUser;

    /** @var MessageBagInterface */
    protected $messageBag;

    /** @var RouterInterface */
    protected $router;

    /**
     * @throws Exception
     * @throws UserNotFoundException
     */
    public function __invoke(
        Request $request,
        string  $procedureId
    ): Response
    {
        $rParams = $request->request->all();
        $fileUpload = $this->getFileUpload($request);
        if (null !== $fileUpload) {
            $rParams['fileupload'] = $fileUpload;
        }
        $originalFileUpload = $this->getOriginalFileUpload($request);
        if (null !== $originalFileUpload) {
            $rParams['originalAttachments'] = [$originalFileUpload];
        }
        if (array_key_exists('r_tags', $rParams) && is_array($rParams['r_tags'])) {
            $rParams['r_recommendation'] = $this->statementHandler->addBoilerplatesOfTags(
                $rParams['r_tags']
            );
        }
        $statement = $this->statementHandler->newStatement(
            $rParams,
            $this->currentUser->getUser()->hasRole(SELF::PROCEDURE_DATA_INPUT)
        );
        $this->handleCreatedStatement($request, $statement);

        return $this->redirectResponse(
            $request,
            [
                self::PARAM_PROCEDURE_ID => $procedureId,
                self::PARAM_STATEMENT => $statement,
            ]
        );
    }

    /**
     * @return mixed
     */
    abstract protected function getFileUpload(Request $request);

    /**
     * @return mixed
     */
    abstract protected function getOriginalFileUpload(Request $request);

    abstract protected function handleCreatedStatement(Request $request, StatementInterface $statement): void;

    /**
     * @param array<string, mixed> $params
     */
    abstract protected function redirectResponse(Request $request, array $params): RedirectResponse;
}

