<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

interface HookProviderInterface
{
    /**
     * Use this method to register callbacks with WordPress hooks for specific actions and filters.
     * This method should usually only contain calls to `add_action()` and `add_filter()`.
     * All class names found in config key `hook/provider` will be called during plugin or theme execution
     */
    public function addHooks(): void;
}
