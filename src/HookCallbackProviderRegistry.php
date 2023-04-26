<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

use function array_values;

final class HookCallbackProviderRegistry
{
    /**
     * @var list<HookCallbackProviderInterface>
     */
    private array $provider;

    public function __construct(HookCallbackProviderInterface ...$provider)
    {
        $this->provider = array_values($provider);
    }

    public function registerHookCallbacks(): void
    {
        foreach ($this->provider as $current) {
            $current->registerHookCallbacks();
        }
    }
}
