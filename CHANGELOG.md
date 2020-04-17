# Change Log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

**View all [Unreleased][] changes here**

## [1.1.0][]
#### Added
-   Added methods `seconds_to_weeks`, `seconds_to_days`, `weeks_to_seconds`, and `days_to_seconds`
-   Added flags `FLAG_INCLUDE_WEEKS`, `FLAG_INCLUDE_DAYS`, `FLAG_INCLUDE_HOURS`, and `FLAG_PAD_STRING` for use in calls to `human_readable_time()`
-   Added constants `SECONDS_IN_MINUTE`, `MINUTES_IN_HOUR`, `HOURS_IN_DAY`, `DAYS_IN_WEEK`, `ONE_MINUTE`, `ONE_HOUR`, `ONE_DAY`, and `ONE_WEEK`

#### Changed
-   `human_readable_time()` accepts flags instead of `$pad` value
-   Added support to `human_readable_time()` for displaying weeks and days

#### Fixed
-   `human_readable_time()` was not producing accurate results. This has been fixed

## [1.0.1][]
#### Fixed
-   Fixed CHANGELOG version info

## 0.1.0
#### Added
-   Initial release

[Unreleased]: https://github.com/pointybeard/helpers-functions-time/compare/1.1.0...integration
[1.1.0]: https://github.com/pointybeard/helpers-functions-time/compare/1.0.1...1.1.0
[1.0.1]: https://github.com/pointybeard/helpers-functions-time/compare/1.0.0...1.0.1
