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
            'hook' => [
                'provider' => [],
            ],
            'dependencies' => [
                'factories' => [
                    HookProviderRegistry::class => HookProviderRegistryFactory::class,
                ],
            ],
        ];
    }
}
