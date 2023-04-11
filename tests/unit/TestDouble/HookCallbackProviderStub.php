<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook\TestDouble;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

final class HookCallbackProviderStub implements HookCallbackProviderInterface
{
    private bool $registerCallbacksCalled = false;

    public function registerHookCallbacks(): void
    {
        $this->registerCallbacksCalled = true;
    }

    public function isRegisterCallbacksCalled(): bool
    {
        return $this->registerCallbacksCalled;
    }
}
