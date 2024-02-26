<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook\TestDouble;

use Kaiseki\WordPress\Hook\HookProviderInterface;

final class HookCallbackProviderStub implements HookProviderInterface
{
    private bool $registerCallbacksCalled = false;

    public function addHooks(): void
    {
        $this->registerCallbacksCalled = true;
    }

    public function isRegisterCallbacksCalled(): bool
    {
        return $this->registerCallbacksCalled;
    }
}
