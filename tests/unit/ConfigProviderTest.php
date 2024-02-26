<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook;

use Kaiseki\WordPress\Hook\ConfigProvider;
use Kaiseki\WordPress\Hook\HookProviderRegistry;
use Kaiseki\WordPress\Hook\HookProviderRegistryFactory;
use PHPUnit\Framework\TestCase;

final class ConfigProviderTest extends TestCase
{
    public function testConfig(): void
    {
        self::assertSame(
            [
                'hook' => [
                    'provider' => [],
                ],
                'dependencies' => [
                    'factories' => [
                        HookProviderRegistry::class => HookProviderRegistryFactory::class,
                    ],
                ],
            ],
            (new ConfigProvider())()
        );
    }
}
