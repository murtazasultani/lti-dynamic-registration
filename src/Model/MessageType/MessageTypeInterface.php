<?php
declare(strict_types=1);

namespace MS\LTI1p3\DynamicRegistration\Model;

use JsonSerializable;
use MS\LTI1p3\DynamicRegistration\Util\Collection\CollectionInterface;

/**
 * @see https://www.imsglobal.org/spec/lti-dr/v1p0#lti-message
 */
interface MessageTypeInterface extends JsonSerializable
{
    public const RESOURCE_LINK_REQUEST = 'LtiResourceLinkRequest';
    public const DEEP_LINKING_REQUEST = 'LtiDeepLinkingRequest';

    public const TYPE = 'type';
    public const LABEL = 'label';
    public const TARGET_LINK_URI = 'target_link_uri';
    public const ICON_URI = 'icon_uri';
    public const CUSTOM_PARAMETERS = 'custom_parameters';
    public const PLACEMENTS = 'placements';
    public const ROLES = 'roles';


    public function getType(): string;

    public function getLabel(): ?string;

    public function getTargetLinkUri(): ?string;

    public function getIconUri(): ?string;

    public function getCustomParameters(): ?array;

    public function getPlacements(): ?array;

    public function getRoles(): ?array;

    public function getAdditionalProperties(): CollectionInterface;
}
