<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

interface HookCallbackProviderInterface
{
    /**
     * Use this method to register callbacks with WordPress `add_action` or `add_filter`
     * All class names found in config key `hook/provider` will be called during plugin or theme execution
     */
    public function registerCallbacks(): void;
}
