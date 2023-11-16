<?php

namespace DemosEurope\DemosplanAddon\Logic\ApiRequest;


use function array_key_exists;

use ArrayAccess;

use function is_array;

use LogicException;

use function reset;

/**
 * @see https://jsonapi.org/format/#document-top-level
 */
class TopLevel implements ArrayAccess
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var ResourceObject|null
     */
    protected $objectToCreate;

    public function setData(array $normalizedData)
    {
        if (null !== $this->data) {
            throw new LogicException('Cannot change request data');
        }

        $this->data = $normalizedData;
    }

    /**
     * @param string $key The type requested
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        throw new LogicException('Cannot change request data');
    }

    public function __isset($key): bool
    {
        return array_key_exists($key, $this->data); // TODO?: Should this check for nested isset?
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet($offset): mixed
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        throw new LogicException('readonly');
    }

    public function offsetUnset($offset): void
    {
        throw new LogicException('readonly');
    }

    /**
     * @return array|mixed
     */
    public function getFirst(string $field)
    {
        $fieldValue = $this[$field];
        if (is_array($fieldValue)) {
            return reset($fieldValue);
        }

        return $fieldValue;
    }

    public function setObjectToCreate(ResourceObject $resourceObject): void
    {
        $this->objectToCreate = $resourceObject;
    }

    public function getObjectToCreate(): ResourceObject
    {
        return $this->objectToCreate;
    }
}

