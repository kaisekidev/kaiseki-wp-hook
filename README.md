# kaiseki/wp-hook

Register classes with `add_filter` and `add_action` hooks.

A hook provider is any object implementing `HookProviderInterface` — its single
`addHooks()` method is where you wire WordPress callbacks with `add_action()` and
`add_filter()`. You list your provider classes under the `hook.provider` config key,
and `HookProviderRegistry` instantiates them through the container and calls `addHooks()`
on each, so every theme or plugin registers its hooks from one place.

## Installation

```bash
composer require kaiseki/wp-hook
```

Requires PHP 8.2 or newer.

## Usage

Implement `HookProviderInterface` and register your WordPress hooks inside `addHooks()`:

```php
use Kaiseki\WordPress\Hook\HookProviderInterface;

final class SetupTheme implements HookProviderInterface
{
    public function addHooks(): void
    {
        add_action('after_setup_theme', [$this, 'registerMenus']);
    }

    public function registerMenus(): void
    {
        // register_nav_menus(...);
    }
}
```

Add the class name to the `hook.provider` config key:

```php
return [
    'hook' => [
        'provider' => [
            SetupTheme::class,
        ],
    ],
];
```

`ConfigProvider` maps `HookProviderRegistry` to `HookProviderRegistryFactory`, which reads
`hook.provider` from the container, instantiates each provider, and builds the registry.
Calling `addHooks()` on the registry then fans out to every provider:

```php
use Kaiseki\WordPress\Hook\HookProviderRegistry;

/** @var HookProviderRegistry $registry */
$registry = $container->get(HookProviderRegistry::class);
$registry->addHooks();
```

Wire `ConfigProvider` into your application's config aggregator (e.g. laminas-config-aggregator)
to register the factory.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan, phpunit
```

## License

MIT — see [LICENSE](LICENSE).
