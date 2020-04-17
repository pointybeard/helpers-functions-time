<?php

declare(strict_types=1);

namespace pointybeard\Helpers\Functions\Time;

use pointybeard\Helpers\Functions\Flags;

/**
 * Include total number of weeks in resultant string. e.g. "12 wks".
 * @see human_readable_time()
 */
const FLAG_INCLUDE_WEEKS = 0x0001;

/**
 * Include total number of days in resultant string. e.g. "4 days".
 * @see human_readable_time()
 */
const FLAG_INCLUDE_DAYS = 0x0002;

/**
 * Include total number of hours in resultant string. e.g. "1 hrs".
 * @see human_readable_time()
 */
const FLAG_INCLUDE_HOURS = 0x0004;

/**
 * If set, each day, hour, minute, and sec value produced by
 * human_readable_time() will be zero padded to 2 digits.
 * e.g. "1 hrs" becomes "01 hrs".
 * @see human_readable_time()
 */
const FLAG_PAD_STRING = 0x0008;

/** Helpful constants. Avoids magic numbers **/
const SECONDS_IN_MINUTE = 60;
const MINUTES_IN_HOUR = 60;
const HOURS_IN_DAY = 24;
const DAYS_IN_WEEK = 7;

const ONE_MINUTE = SECONDS_IN_MINUTE;
const ONE_HOUR = ONE_MINUTE * MINUTES_IN_HOUR;
const ONE_DAY = ONE_HOUR * HOURS_IN_DAY;
const ONE_WEEK = ONE_DAY * DAYS_IN_WEEK;

/**
 * Converts a value in seconds to a human readable time string.
 *
 * @param int $seconds value in seconds to convert
 * @param int $flags   Modify the final output via flags. Optional.
 *
 * @return string the formatted string
 *
 * @throws Exception
 */
if (!function_exists(__NAMESPACE__.'\human_readable_time')) {
    function human_readable_time(int $seconds, ?int $flags = FLAG_PAD_STRING | FLAG_INCLUDE_HOURS): string
    {
        if (0 == $seconds) {
            return '0 sec';
        } elseif (0 > $seconds) {
            throw new \Exception('Value provided for $seconds must be a positive integer.');
        }

        $weeks = null;
        if (true == Flags\is_flag_set($flags, FLAG_INCLUDE_WEEKS)) {
            $weeks = floor(namespace\seconds_to_weeks($seconds));
            $seconds -= namespace\weeks_to_seconds($weeks);
        }

        $days = null;
        if (true == Flags\is_flag_set($flags, FLAG_INCLUDE_DAYS)) {
            $days = floor(namespace\seconds_to_days($seconds));
            $seconds -= namespace\days_to_seconds($days);
        }

        $hours = null;
        if (true == Flags\is_flag_set($flags, FLAG_INCLUDE_HOURS)) {
            $hours = floor(namespace\seconds_to_hours($seconds));
            $seconds -= namespace\hours_to_seconds($hours);
        }

        $minutes = floor(namespace\seconds_to_minutes($seconds));
        $seconds -= namespace\minutes_to_seconds($minutes);

        $padString = function ($value) use ($flags): string {
            $value = (string) $value;
            if (true == Flags\is_flag_set($flags, FLAG_PAD_STRING)) {
                $value = str_pad($value, 2, '0', \STR_PAD_LEFT);
            }

            return $value;
        };

        return trim(
            (null != $weeks && $weeks > 0 ? sprintf('%s wks ', $weeks) : '').
            (null != $days && $days > 0 ? sprintf('%s days ', $padString($days)) : '').
            (null != $hours && $hours > 0 ? sprintf('%s hr ', $padString($hours)) : '').
            (null != $minutes && $minutes > 0 ? sprintf('%s min ', $padString($minutes)) : '').
            sprintf('%s sec ', $padString($seconds))
        );
    }
}

/**
 * Converts a value in seconds to weeks.
 *
 * @param int $seconds value in seconds to convert
 *
 * @return float the number of weeks
 */
if (!function_exists(__NAMESPACE__.'\seconds_to_weeks')) {
    function seconds_to_weeks($seconds): float
    {
        return (float) $seconds * (1.0 / ONE_WEEK);
    }
}

/**
 * Converts a value in seconds to days.
 *
 * @param int $seconds value in seconds to convert
 *
 * @return float the number of days
 */
if (!function_exists(__NAMESPACE__.'\seconds_to_days')) {
    function seconds_to_days($seconds): float
    {
        return (float) $seconds * (1.0 / ONE_DAY);
    }
}

/*
 * Converts a value in seconds to hours.
 *
 * @param int $seconds value in seconds to convert
 *
 * @return float the number of hours
 */
if (!function_exists(__NAMESPACE__.'\seconds_to_hours')) {
    function seconds_to_hours($seconds): float
    {
        return (float) $seconds * (1.0 / ONE_HOUR);
    }
}

/**
 * Converts a value in seconds to minutes.
 *
 * @param int $seconds value in seconds to convert
 *
 * @return float the number of minutes
 */
if (!function_exists(__NAMESPACE__.'\seconds_to_minutes')) {
    function seconds_to_minutes($seconds): float
    {
        return (float) $seconds * (1.0 / ONE_MINUTE);
    }
}

/*
 * Converts weeks into seconds
 *
 * @param mixed $weeks value to convert
 *
 * @return float the number of seconds in specified weeks
 */
if (!function_exists(__NAMESPACE__.'\weeks_to_seconds')) {
    function weeks_to_seconds($weeks)
    {
        return $weeks * ONE_WEEK;
    }
}

/**
 * Converts days into seconds
 *
 * @param mixed $days value to convert
 *
 * @return float the number of seconds in specified days
 */
if (!function_exists(__NAMESPACE__.'\days_to_seconds')) {
    function days_to_seconds($days)
    {
        return $days * ONE_DAY;
    }
}

/*
 * Converts hours into seconds
 *
 * @param mixed $hours value to convert
 *
 * @return float the number of seconds in specified hours
 */
if (!function_exists(__NAMESPACE__.'\hours_to_seconds')) {
    function hours_to_seconds($hours)
    {
        return $hours * ONE_HOUR;
    }
}

/**
 * Converts minutes into seconds
 *
 * @param mixed $minutes value to convert
 *
 * @return float the number of seconds in specified minutes
 */
if (!function_exists(__NAMESPACE__.'\minutes_to_seconds')) {
    function minutes_to_seconds($minutes)
    {
        return $minutes * ONE_MINUTE;
    }
}
