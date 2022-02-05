<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook;

use Kaiseki\Test\Unit\WordPress\Hook\TestDouble\FakeContainer;
use Kaiseki\Test\Unit\WordPress\Hook\TestDouble\HookCallbackProviderStub;
use Kaiseki\WordPress\Config\ConfigInterface;
use Kaiseki\WordPress\Config\NestedArrayConfig;
use Kaiseki\WordPress\Hook\HookCallbackProviderRegistryFactory;
use PHPUnit\Framework\TestCase;

final class HookCallbackProviderRegistryFactoryTest extends TestCase
{
    private HookCallbackProviderRegistryFactory $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new HookCallbackProviderRegistryFactory();
    }

    public function testCreateInstance(): void
    {
        $provider = new HookCallbackProviderStub();
        $configInstance = new NestedArrayConfig(
            [
                'hook' => [
                    'provider' => [
                        HookCallbackProviderStub::class,
                    ],
                ],
            ]
        );
        $config = [
            HookCallbackProviderStub::class => $provider,
            ConfigInterface::class => $configInstance,
        ];
        $container = new FakeContainer($config);

        ($this->factory)($container)->registerCallbacks();

        self::assertTrue($provider->isRegisterCallbacksCalled());
    }
}
