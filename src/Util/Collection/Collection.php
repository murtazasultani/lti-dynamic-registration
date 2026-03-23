<?php
declare(strict_types=1);

namespace MS\LTI1p3\DynamicRegistration\Util\Collection;

use ArrayIterator;
use InvalidArgumentException;

class Collection implements CollectionInterface
{
    private array $items = [];

    public function all(): array
    {
        return $this->items;
    }

    public function keys(): array
    {
        return array_keys($this->items);
    }

    public function replace(array $items): CollectionInterface
    {
        $this->items = $items;

        return $this;
    }

    public function add(array $items): CollectionInterface
    {
        $this->items = array_replace($this->items, $items);

        return $this;
    }

    public function get(string $key, $defaultValue = null)
    {
        return $this->items[$key] ?? $defaultValue;
    }

    public function getMandatory(string $key)
    {
        if (!$this->has($key)) {
            throw new InvalidArgumentException(sprintf('Missing mandatory %s', $key));
        }

        return $this->items[$key];
    }

    public function set(string $key, $value): CollectionInterface
    {
        $this->items[$key] = $value;

        return $this;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    public function remove(string $key): CollectionInterface
    {
        unset($this->items[$key]);

        return $this;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return $this->getIterator()->count();
    }

    public function jsonSerialize(): array
    {
        return array_filter($this->items);
    }
}