<?php
declare(strict_types=1);

namespace MS\LTI1p3\DynamicRegistration\Tests\Unit\Model\MessageType;

use PHPUnit\Framework\TestCase;

final class MessageTypeTest extends TestCase
{
    public function testStart(): void
    {
        $this->assertSame('a', 'a');
    }
}