<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

final class HookCallbackProviderRegistry
{
    /** @var list<HookCallbackProviderInterface> */
    private array $provider;

    public function __construct(HookCallbackProviderInterface ...$provider)
    {
        $this->provider = $provider;
    }

    public function registerCallbacks(): void
    {
        foreach ($this->provider as $current) {
            $current->registerCallbacks();
        }
    }
}
