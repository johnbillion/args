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
	public string|array $before;

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
	public string|array $after;

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
	 * @var int|array<int,int>
	 * @phpstan-var int<1000,9999>|list<int<1000,9999>>
	 */
	public int|array $year;

	/**
	 * The two-digit month number. Accepts numbers 1-12 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,12>|list<int<1,12>>
	 */
	public int|array $month;

	/**
	 * The week number of the year. Accepts numbers 1-53 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,53>|list<int<1,53>>
	 */
	public int|array $week;

	/**
	 * The day number of the year. Accepts numbers 1-366 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,366>|list<int<1,366>>
	 */
	public int|array $dayofyear;

	/**
	 * The day of the month. Accepts numbers 1-31 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,31>|list<int<1,31>>
	 */
	public int|array $day;

	/**
	 * The day number of the week. Accepts numbers 1-7 (1 is
	 * Sunday) or an array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,7>|list<int<1,7>>
	 */
	public int|array $dayofweek;

	/**
	 * The day number of the week (ISO). Accepts numbers 1-7
	 * (1 is Monday) or an array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<1,7>|list<int<1,7>>
	 */
	public int|array $dayofweek_iso;

	/**
	 * The hour of the day. Accepts numbers 0-23 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<0,23>|list<int<0,23>>
	 */
	public int|array $hour;

	/**
	 * The minute of the hour. Accepts numbers 0-59 or an array
	 * of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<0,59>|list<int<0,59>>
	 */
	public int|array $minute;

	/**
	 * The second of the minute. Accepts numbers 0-59 or an
	 * array of valid numbers if `$compare` supports it.
	 *
	 * Default empty.
	 *
	 * @var int|array<int,int>
	 * @phpstan-var int<0,59>|list<int<0,59>>
	 */
	public int|array $second;

}
