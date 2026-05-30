# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 2.0.0 - 2026-05-30

### Changed

- **BC:** PHP requirement is now `^8.2` (PHP 8.4 is the primary target). Consumers on PHP < 8.2 must upgrade.
- **BC:** `kaiseki/config` is now required at `^2.0` (was tracked via `dev-master`).
- Modernized the dev toolchain (PHPStan 2 at `level: max`, PHPUnit 11, composer-require-checker 4,
  `szepeviktor/phpstan-wordpress` 2) and depend on `kaiseki/php-coding-standard: ^1.0` with the shared
  PHPStan config. CI now runs via the reusable workflow in `kaisekidev/.github` across the 8.2/8.3/8.4 matrix.

### Breaking (since 1.0.1, previously untagged)

- **BC:** Renamed the public API from `HookCallbackProvider*` to `HookProvider*`:
  - `HookCallbackProviderInterface` → `HookProviderInterface`
  - `HookCallbackProviderRegistry` → `HookProviderRegistry`
  - `HookCallbackProviderRegistryFactory` → `HookProviderRegistryFactory`
- **BC:** Renamed the interface method `registerCallbacks()` → `addHooks()`. Implementations and any
  code calling the registry must be updated accordingly.

## 1.0.1 - 2022-02-06

### Added

- Missing `LICENSE` file (MIT).

## 1.0.0 - 2022-02-05

First tagged release.

### Added

- `HookCallbackProviderInterface`, `HookCallbackProviderRegistry`, and
  `HookCallbackProviderRegistryFactory` for collecting hook-provider classes from the `hook.provider`
  config key and registering their WordPress callbacks. Imported from `woda/wp-hook`.
- `ConfigProvider` mapping the registry to its factory.
