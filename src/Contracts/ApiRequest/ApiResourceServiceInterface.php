<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\ApiRequest;

use DemosEurope\DemosplanAddon\Contracts\Entities\CoreEntityInterface;
use DemosEurope\DemosplanAddon\Contracts\ValueObject\ValueObjectInterface;
use DemosEurope\DemosplanAddon\Logic\ApiRequest\Transformer\BaseTransformerInterface;
use Exception;
use League\Fractal\Manager;
use Doctrine\Common\Collections\Collection;
use League\Fractal\Resource\Item;
use Symfony\Component\Security\Core\User\UserInterface;

interface ApiResourceServiceInterface
{
    public function getFractal(): Manager;

    /**
     * @param string $transformerName #Service Service name or fq class name of the transformer
     *
     * @throws Exception
     */
    public function getTransformer(string $transformerName): BaseTransformerInterface;

    /**
     * @param iterable|CoreEntityInterface[]|ValueObjectInterface[] $data
     * @param string $transformerName #Service Service name or fq class name of the transformer
     * @param string $type optionally override the item type
     */
    public function makeCollection($data, string $transformerName, $type = ''): Collection;

    /**
     * @param                           $data
     * @param BaseTransformerInterface  $baseTransformer
     * @param                           $type
     *
     * @return Collection
     */
    public function makeAddonCollection($data, BaseTransformerInterface $baseTransformer, $type = ''): Collection;

    /**
     * @param iterable|CoreEntityInterface[]|ValueObjectInterface[] $data
     * @param string $resourceTypeName The value returned by {@link ResourceTypeInterface::getName()}
     */
    public function makeCollectionOfResources($data, string $resourceTypeName): Collection;

    /**
     * @param array|CoreEntityInterface|ValueObjectInterface|UserInterface $data
     * @param string $transformerName #Service name or fq class name of the transformer
     * @param string $type optionally override the item type
     */
    public function makeItem($data, string $transformerName, $type = ''): Item;

    /**
     * @param string $resourceTypeName The value returned by {@link ResourceTypeInterface::getName()}
     */
    public function makeItemOfResource($data, string $resourceTypeName): Item;
}
