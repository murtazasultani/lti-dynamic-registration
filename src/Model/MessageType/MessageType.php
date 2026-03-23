<?php
declare(strict_types=1);

namespace MS\LTI1p3\DynamicRegistration\Model\MessageType;

use MS\LTI1p3\DynamicRegistration\Util\Collection\Collection;
use MS\LTI1p3\DynamicRegistration\Util\Collection\CollectionInterface;

class MessageType implements MessageTypeInterface
{
    public function __construct(
        private string $type,
        private ?string $label = null,
        private ?string $targetLinkUri = null,
        private ?string $iconUri = null,
        private ?array $customParameters = null,
        private array $placements = ['ContentArea'],
        private ?array $roles = null,
        // Extensibility
        private array $additionalProperties = []
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getTargetLinkUri(): ?string
    {
        return $this->targetLinkUri;
    }

    public function getIconUri(): ?string
    {
        return $this->iconUri;
    }

    public function getCustomParameters(): ?array
    {
        return $this->customParameters;
    }

    public function getPlacements(): ?array
    {
        return $this->placements;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function getAdditionalProperties(): CollectionInterface
    {
        return (new Collection())->add($this->additionalProperties);
    }

    public function jsonSerialize(): mixed
    {
        return array_filter([
            ...$this->getAdditionalProperties()->all(),
            static::TYPE => $this->getType(),
            static::LABEL => $this->getLabel(),
            static::TARGET_LINK_URI => $this->getTargetLinkUri(),
            static::ICON_URI => $this->getIconUri(),
            static::CUSTOM_PARAMETERS => $this->getCustomParameters(),
            static::PLACEMENTS => $this->getPlacements(),
            static::ROLES => $this->getRoles()
        ], static fn($value): bool => $value !== null);
    }
}
