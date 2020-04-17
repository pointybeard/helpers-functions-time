# PHP Helpers: Time Functions

-   Version: v1.1.0
-   Date: April 17 2020
-   [Release notes](https://github.com/pointybeard/helpers-functions-time/blob/master/CHANGELOG.md)
-   [GitHub repository](https://github.com/pointybeard/helpers-functions-time)

A collection of functions used to manipulate time values

## Installation

This library is installed via [Composer](http://getcomposer.org/). To install, use `composer require pointybeard/helpers-functions-time` or add `"pointybeard/helpers-functions-time": "~1.1.0"` to your `composer.json` file.

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

### Requirements

This library makes use of the [pointybeard/helpers-exceptions-readabletrace](https://github.com/pointybeard/helpers-exceptions-readabletrace) package. It is installed automatically via composer.

To include all the [PHP Helpers](https://github.com/pointybeard/helpers) packages on your project, use `composer require pointybeard/helpers` or add `"pointybeard/helpers": "~1.2.0"` to your composer file.

## Usage

This library is a collection convenience function for common tasks relating to time. They are included by the vendor autoloader automatically. The functions have a namespace of `pointybeard\Helpers\Functions\Time`

The following functions are provided:

-   `human_readable_time(int $seconds, ?int $flags = FLAG_PAD_STRING | FLAG_INCLUDE_HOURS): string`
-   `seconds_to_weeks($seconds): float`
-   `seconds_to_days($seconds): float`
-   `seconds_to_hours($seconds): float`
-   `seconds_to_minutes($seconds): float`
-   `weeks_to_seconds($weeks)`
-   `days_to_seconds($days)`
-   `hours_to_seconds($hours)`
-   `minutes_to_seconds($minutes)`

Example usage:

```php
<?php

declare(strict_types=1);

include __DIR__.'/vendor/autoload.php';

use pointybeard\Helpers\Functions\Time;

$seconds = 9064442;

var_dump(
    Time\seconds_to_weeks($seconds),
    // float(14.987503306878)

    Time\seconds_to_days($seconds),
    // float(104.91252314815)

    Time\seconds_to_hours($seconds),
    // float(2517.9005555556)

    Time\seconds_to_minutes($seconds),
    // float(151074.03333333)

    Time\weeks_to_seconds(Time\seconds_to_weeks($seconds)),
    // float(9064442)

    Time\days_to_seconds(Time\seconds_to_days($seconds)),
    // float(9064442)

    Time\hours_to_seconds(Time\seconds_to_hours($seconds)),
    // float(9064442)

    Time\minutes_to_seconds(Time\seconds_to_minutes($seconds)),
    // float(9064442)

    Time\human_readable_time($seconds),
    // string(21) "2517 hr 54 min 02 sec"

    Time\human_readable_time(
        $seconds,
        Time\FLAG_INCLUDE_WEEKS |
        Time\FLAG_INCLUDE_DAYS |
        Time\FLAG_INCLUDE_HOURS |
        Time\FLAG_PAD_STRING
    ),
    // string(34) "14 wks 06 days 21 hr 54 min 02 sec"

    Time\human_readable_time($seconds, null),
    // string(16) "151074 min 2 sec"

    Time\human_readable_time(0),
    // string(5) "0 sec"
);

try {
    Time\human_readable_time('not a number');
} catch (TypeError $e) {
    var_dump($e->getMessage());
}
// string(182) "Argument 1 passed to pointybeard\Helpers\Functions\Time\human_readable_time() must be of the type int, string given, called in /var/sources/helpers-functions-time/test.php on line 43"

try {
    Time\human_readable_time(-$seconds);
} catch (Exception $e) {
    var_dump($e->getMessage());
}
// string(55) "Value provided for $seconds must be a positive integer."

```

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/pointybeard/helpers-functions-time/issues),
or better yet, fork the library and submit a pull request.

## Contributing

We encourage you to contribute to this project. Please check out the [Contributing documentation](https://github.com/pointybeard/helpers-functions-time/blob/master/CONTRIBUTING.md) for guidelines about how to get involved.

## License

"PHP Helpers: Time Functions" is released under the [MIT License](http://www.opensource.org/licenses/MIT).
