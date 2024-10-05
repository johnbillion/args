<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `register_setting()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/register_setting/
 */
class register_setting extends Shared\Base {
	public const TYPE_STRING = 'string';
	public const TYPE_BOOLEAN = 'boolean';
	public const TYPE_INTEGER = 'integer';
	public const TYPE_NUMBER = 'number';
	public const TYPE_ARRAY = 'array';
	public const TYPE_OBJECT = 'object';

	/**
	 * The type of data associated with this setting. Valid values are 'string', 'boolean', 'integer', 'number', 'array', and 'object'.
	 *
	 * @phpstan-var self::TYPE_*
	 */
	public string $type;

	/**
	 * A label of the data attached to this setting.
	 */
	public string $label;

	/**
	 * A description of the data attached to this setting.
	 */
	public string $description;

	/**
	 * A callback function that sanitizes the option's value.
	 *
	 * The callback is called via the https://developer.wordpress.org/reference/hooks/sanitize_option_option/ filter.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed,string,mixed):mixed
	 */
	public $sanitize_callback;

	/**
	 * Whether data associated with this setting should be included in the REST API. When registering complex settings, this argument may optionally be an array with a 'schema' key.
	 *
	 * @var bool|array<string, mixed>
	 */
	public bool|array $show_in_rest;

	/**
	 * Default value when calling `get_option()`.
	 */
	public mixed $default;
}
