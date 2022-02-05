<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    HookCallbackProviderRegistry::class => HookCallbackProviderRegistryFactory::class,
                ],
            ],
            'hook' => [
                'provider' => [],
            ],
        ];
    }
}
