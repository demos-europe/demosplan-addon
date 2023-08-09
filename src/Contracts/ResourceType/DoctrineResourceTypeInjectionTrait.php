<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\ApiRequest\DplanPropertyBuilderFactory;
use DemosEurope\DemosplanAddon\Contracts\Logger\ApiLoggerInterface;
use DemosEurope\DemosplanAddon\Contracts\Services\TransactionServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\JsonApi\ResourceTypes\PropertyBuilderFactory;
use EDT\Wrapping\Utilities\SchemaPathProcessor;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait DoctrineResourceTypeInjectionTrait
{
    protected ?SchemaPathProcessor $schemaPathProcessor = null;
    protected ?EventDispatcherInterface $eventDispatcher = null;
    protected ?DplanPropertyBuilderFactory $propertyBuilderFactory = null;
    protected ?EntityManagerInterface $entityManager = null;
    protected ?LoggerInterface $logger = null;
    protected ?MessageFormatter $messageFormatter = null;
    protected ?TransactionServiceInterface $transactionService = null;
    protected ?JsonApiResourceTypeServiceInterface $jsonApiResourceTypeService = null;

    #[Required]
    public function setSchemaPathProcessor(SchemaPathProcessor $schemaPathProcessor): void
    {
        $this->schemaPathProcessor = $schemaPathProcessor;
    }

    protected function getSchemaPathProcessor(): SchemaPathProcessor
    {
        return $this->schemaPathProcessor;
    }

    #[Required]
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    protected function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    #[Required]
    public function setPropertyBuilderFactory(DplanPropertyBuilderFactory $propertyBuilderFactory): void
    {
        $this->propertyBuilderFactory = $propertyBuilderFactory;
    }

    protected function getPropertyBuilderFactory(): DplanPropertyBuilderFactory
    {
        return $this->propertyBuilderFactory;
    }

    #[Required]
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    #[Required]
    public function setLogger(ApiLoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    #[Required]
    public function setMessageFormatter(MessageFormatter $messageFormatter): void
    {
        $this->messageFormatter = $messageFormatter;
    }

    protected function getMessageFormatter(): MessageFormatter
    {
        return $this->messageFormatter;
    }

    #[Required]
    public function setTransactionService(TransactionServiceInterface $transactionService): void
    {
        $this->transactionService = $transactionService;
    }

    protected function getTransactionService(): TransactionServiceInterface
    {
        return $this->transactionService;
    }

    #[Required]
    public function setJsonApiResourceTypeService(JsonApiResourceTypeServiceInterface $jsonApiResourceTypeService): void
    {
        $this->jsonApiResourceTypeService = $jsonApiResourceTypeService;
    }

    protected function getJsonApiResourceTypeService(): JsonApiResourceTypeServiceInterface
    {
        return $this->jsonApiResourceTypeService;
    }
}
