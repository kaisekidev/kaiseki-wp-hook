<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook;

use Kaiseki\WordPress\Hook\ConfigProvider;
use Kaiseki\WordPress\Hook\HookCallbackProviderRegistry;
use Kaiseki\WordPress\Hook\HookCallbackProviderRegistryFactory;
use PHPUnit\Framework\TestCase;

final class ConfigProviderTest extends TestCase
{
    public function testConfig(): void
    {
        self::assertSame(
            [
                'dependencies' => [
                    'factories' => [
                        HookCallbackProviderRegistry::class => HookCallbackProviderRegistryFactory::class,
                    ],
                ],
                'hook' => [
                    'provider' => [
                    ],
                ],
            ],
            (new ConfigProvider())()
        );
    }
}
