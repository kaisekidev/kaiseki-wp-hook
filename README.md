# kaiseki/wp-hook

Register classes with `add_filter` and `add_action` hooks

## Install

```bash
composer require kaiseki/wp-hook
```

## Usage

* Implement a class with the `HookCallbackProviderInterface`, e.g.:

```php
final class DoSomething implements \Kaiseki\WordPress\Hook\HookCallbackProviderInterface
{
    public function registerCallbacks(): void
    {
        \add_action('after_setup_theme', [$this, 'doSomething'], 10, 0);
    }

    public function doSomething(): void { /*...*/ }
}
```

* Add class name to config key `hook/provider`

```php
return [
    'hook' => [
        'provider' => [
            DoSomething::class
        ],
    ],
];
```

* Classes registered on this key will be called by using `HookCallbackProviderRegistry` and calling `registerCallbacks`
