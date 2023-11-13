<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\EntityInterface;
use DemosEurope\DemosplanAddon\Contracts\ResourceType\JsonApiResourceTypeInterface;
use EDT\DqlQuerying\Contracts\ClauseFunctionInterface;
use EDT\DqlQuerying\Contracts\OrderBySortMethodInterface;
use EDT\JsonApi\Event\AfterCreationEvent;
use EDT\JsonApi\Event\AfterUpdateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Webmozart\Assert\Assert;

class ResourceValidationSubscriber implements EventSubscriberInterface
{
    public function __construct(
        protected readonly ValidatorInterface $validator
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            AfterCreationEvent::class => 'validateResource',
            AfterUpdateEvent::class => 'validateResource'
        ];
    }

    /**
     * @param AfterCreationEvent<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, EntityInterface>|AfterUpdateEvent<ClauseFunctionInterface<bool>, OrderBySortMethodInterface, EntityInterface> $event
     */
    public function validateResource(AfterCreationEvent|AfterUpdateEvent $event): void
    {
        $type = $event->getType();
        $entity = $event->getEntity();

        Assert::isInstanceOf($type, JsonApiResourceTypeInterface::class);
        /** @var JsonApiResourceTypeInterface<EntityInterface> $type */
        if ($event instanceof AfterCreationEvent) {
            $eventName = 'creation';
            $validationGroups = $type->getCreationValidationGroups();
        } else {
            $eventName = 'update';
            $validationGroups = $type->getUpdateValidationGroups();
        }

        if ([] === $validationGroups) {
            return;
        }

        $violations = $this->validator->validate($entity, null, $validationGroups);

        if (0 !== $violations->count()) {
            $message = "Validation of `{$type->getTypeName()}` entity failed after $eventName.";

            throw new ResourceViolationException($violations, $validationGroups, $message);
        }
    }
}
