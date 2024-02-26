<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

use function array_values;

final class HookProviderRegistry
{
    /** @var list<HookProviderInterface> */
    private array $provider;

    public function __construct(HookProviderInterface ...$provider)
    {
        $this->provider = array_values($provider);
    }

    public function addHooks(): void
    {
        foreach ($this->provider as $current) {
            $current->addHooks();
        }
    }
}
