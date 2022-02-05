<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

use Kaiseki\WordPress\Config\Config;
use Psr\Container\ContainerInterface;

final class HookCallbackProviderRegistryFactory
{
    public function __invoke(ContainerInterface $container): HookCallbackProviderRegistry
    {
        /** @var list<class-string<HookCallbackProviderInterface>> $provider */
        $provider = Config::get($container)->array('hook/provider');
        return new HookCallbackProviderRegistry(...Config::initClassMap($container, $provider));
    }
}
