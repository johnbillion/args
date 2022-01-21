<?php

declare(strict_types=1);

namespace Args\DateQuery;

use Args\Arrayable\Arrayable;

/**
 * Arguments for a clause within a date query, for example those within a `$date_query` argument.
 */
final class Clause implements Arrayable, Values {
	use \Args\Arrayable\ProvidesFromArray;
	use \Args\Arrayable\ProvidesToArray;

	/**
	 * Date to retrieve posts before. Accepts `strtotime()`-compatible string, or array of 'year', 'month', 'day' values.
	 *
	 * @var string|array<string, string>
	 * @phpstan-var string|array{
	 *   year: numeric-string,
	 *   month?: numeric-string,
	 *   day?: numeric-string,
	 * }
	 */
	public $before;

	/**
	 * Date to retrieve posts after. Accepts `strtotime()`-compatible string, or array of 'year', 'month', 'day' values.
	 *
	 * @var string|array<string, string>
	 * @phpstan-var string|array{
	 *   year: numeric-string,
	 *   month?: numeric-string,
	 *   day?: numeric-string,
	 * }
	 */
	public $after;

	/**
	 * Used to add a clause comparing a column other than
	 * the column specified in the top-level `$column` parameter.
	 * See WP_Date_Query::validate_column() and
	 * the {@see 'date_query_valid_columns'} filter for the list
	 * of accepted values.
	 *
	 * Default is the value of top-level `$column`.
	 */
	public string $column;

	/**
	 * The comparison operator. Accepts '=', '!=', '>', '>=',
	 * '<', '<=', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN'. 'IN',
	 * 'NOT IN', 'BETWEEN', and 'NOT BETWEEN'. Comparisons support
	 * arrays in some time-related parameters.
	 *
	 * Default '='.
	 *
	 * @phpstan-var Values::DATE_QUERY_COMPARE_*
	 */
	public string $compare;

	/**
	 * Include results from dates specified in 'before' or 'after'.
	 *
	 * Default false.
	 */
	public bool $inclusive;

	/**
	 * The four-digit year number. Accepts any four-digit year
	 * or an array of years if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 */
	public $year;

	/**
	 * The two-digit month number. Accepts numbers 1-12 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,12>|array<int, int<1,12>>
	 */
	public $month;

	/**
	 * The week number of the year. Accepts numbers 0-53 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<0,53>|array<int, int<0,53>>
	 */
	public $week;

	/**
	 * The day number of the year. Accepts numbers 1-366 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,366>|array<int, int<1,366>>
	 */
	public $dayofyear;

	/**
	 * The day of the month. Accepts numbers 1-31 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,31>|array<int, int<1,31>>
	 */
	public $day;

	/**
	 * The day number of the week. Accepts numbers 1-7 (1 is
	 * Sunday) or an array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,7>|array<int, int<1,7>>
	 */
	public $dayofweek;

	/**
	 * The day number of the week (ISO). Accepts numbers 1-7
	 * (1 is Monday) or an array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,7>|array<int, int<1,7>>
	 */
	public $dayofweek_iso;

	/**
	 * The hour of the day. Accepts numbers 0-23 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<1,23>|array<int, int<1,23>>
	 */
	public $hour;

	/**
	 * The minute of the hour. Accepts numbers 0-59 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<0,59>|array<int, int<0,59>>
	 */
	public $minute;

	/**
	 * The second of the minute. Accepts numbers 0-59 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|int[]
	 * @phpstan-var int<0,59>|array<int, int<0,59>>
	 */
	public $second;

}
