<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ResourceType;

use DemosEurope\DemosplanAddon\Contracts\Logger\ApiLoggerInterface;
use DemosEurope\DemosplanAddon\Contracts\Services\TransactionServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use EDT\JsonApi\RequestHandling\MessageFormatter;
use EDT\JsonApi\Utilities\PropertyBuilderFactory;
use EDT\Wrapping\Contracts\TypeProviderInterface;
use EDT\Wrapping\Utilities\SchemaPathProcessor;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait DoctrineResourceTypeInjectionTrait
{
    protected ?SchemaPathProcessor $schemaPathProcessor = null;
    protected ?EventDispatcherInterface $eventDispatcher = null;
    protected ?PropertyBuilderFactory $propertyBuilderFactory = null;
    protected ?EntityManagerInterface $entityManager = null;
    protected ?LoggerInterface $logger = null;
    protected ?MessageFormatter $messageFormatter = null;
    protected ?TransactionServiceInterface $transactionService = null;
    protected ?JsonApiResourceTypeServiceInterface $jsonApiResourceTypeService = null;
    protected ?TypeProviderInterface $typeProvider = null;
    protected ?ApiLoggerInterface $apiLogger = null;

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
    public function setPropertyBuilderFactory(PropertyBuilderFactory $propertyBuilderFactory): void
    {
        $this->propertyBuilderFactory = $propertyBuilderFactory;
    }

    protected function getPropertyBuilderFactory(): PropertyBuilderFactory
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

    #[Required]
    public function setTypeProvider(TypeProviderInterface $typeProvider): void
    {
        $this->typeProvider = $typeProvider;
    }

    protected function getTypeProvider(): TypeProviderInterface
    {
        return $this->typeProvider;
    }

    #[Required]
    public function setApiLogger(ApiLoggerInterface $apiLogger): void
    {
        $this->apiLogger = $apiLogger;
    }

    protected function getApiLogger(): ApiLoggerInterface
    {
        return $this->apiLogger;
    }
}
