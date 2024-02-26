<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Hook;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class HookProviderRegistryFactory
{
    public function __invoke(ContainerInterface $container): HookProviderRegistry
    {
        /** @var list<class-string<HookProviderInterface>> $provider */
        $provider = Config::fromContainer($container)->array('hook.provider');

        return new HookProviderRegistry(...Config::initClassMap($container, $provider));
    }
}
