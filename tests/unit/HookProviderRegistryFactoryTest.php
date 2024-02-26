<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook;

use Kaiseki\Test\Unit\WordPress\Hook\TestDouble\FakeContainer;
use Kaiseki\Test\Unit\WordPress\Hook\TestDouble\HookCallbackProviderStub;
use Kaiseki\WordPress\Hook\HookProviderRegistryFactory;
use PHPUnit\Framework\TestCase;

final class HookProviderRegistryFactoryTest extends TestCase
{
    private HookProviderRegistryFactory $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new HookProviderRegistryFactory();
    }

    public function testCreateInstance(): void
    {
        $provider = new HookCallbackProviderStub();
        $config = [
            HookCallbackProviderStub::class => $provider,
            'config' => [
                'hook' => [
                    'provider' => [
                        HookCallbackProviderStub::class,
                    ],
                ],
            ],
        ];
        $container = new FakeContainer($config);

        ($this->factory)($container)->addHooks();

        self::assertTrue($provider->isRegisterCallbacksCalled());
    }
}
