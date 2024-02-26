<?php

declare(strict_types=1);

namespace Kaiseki\Test\Unit\WordPress\Hook\TestDouble;

use Psr\Container\ContainerInterface;

use function array_key_exists;

final class FakeContainer implements ContainerInterface
{
    /** @var array<array-key, mixed> */
    private array $config;

    /**
     * @param array<array-key, mixed> $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function get($id) // phpcs:ignore
    {
        return $this->config[$id] ?? null;
    }

    /**
     * @param string $id
     */
    public function has($id): bool // phpcs:ignore
    {
        return array_key_exists($id, $this->config);
    }
}
