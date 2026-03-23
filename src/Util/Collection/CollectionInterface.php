<?php
declare(strict_types=1);

namespace MS\LTI1p3\DynamicRegistration\Util\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use JsonSerializable;

interface CollectionInterface extends IteratorAggregate, Countable, JsonSerializable
{
    public function all(): array;

    public function keys(): array;

    public function replace(array $items): CollectionInterface;

    public function add(array $items): CollectionInterface;

    public function get(string $key, $defaultValue = null);

    public function getMandatory(string $key);

    public function set(string $key, $value): CollectionInterface;

    public function has(string $key): bool;

    public function remove(string $key): CollectionInterface;

    public function getIterator(): ArrayIterator;

    public function count(): int;
}