<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `register_meta()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/register_meta/
 */
class register_meta extends Shared\Base {
	const TYPE_STRING = 'string';
	const TYPE_BOOLEAN = 'boolean';
	const TYPE_INTEGER = 'integer';
	const TYPE_NUMBER = 'number';
	const TYPE_ARRAY = 'array';
	const TYPE_OBJECT = 'object';

	/**
	 * A subtype; e.g. if the object type is "post", the post type.
	 *
	 * If left empty, the meta key will be registered on the entire object type.
	 *
	 * Default empty.
	 */
	public string $object_subtype;

	/**
	 * The type of data associated with this meta key.
	 *
	 * Valid values are 'string', 'boolean', 'integer', 'number', 'array', and 'object'.
	 *
	 * @phpstan-var self::TYPE_*
	 */
	public string $type;

	/**
	 * A description of the data attached to this meta key.
	 */
	public string $description;

	/**
	 * Whether the meta key has one value per object, or an array of values per object.
	 */
	public bool $single;

	/**
	 * The default value returned from `get_metadata()` if no value has been set yet.
	 *
	 * When using a non-single meta key, the default value is for the first entry. In other words, when calling `get_metadata()` with `$single` set to `false`, the default value given here will be wrapped in an array.
	 */
	public mixed $default;

	/**
	 * A function or method to call when sanitizing `$meta_key` data.
	 *
	 * @var callable
	 * @phpstan-var (callable(mixed,string,string,string): mixed)|(callable(mixed,string,string): mixed)
	 */
	public $sanitize_callback;

	/**
	 * A function or method to call when performing `edit_post_meta`, `add_post_meta`, and `delete_post_meta` capability checks.
	 *
	 * @var callable
	 * @phpstan-var (callable(bool,string,string,string): bool)|(callable(bool,string,string): bool)
	 */
	public $auth_callback;

	/**
	 * Whether data associated with this meta key can be considered public and should be accessible via the REST API.
	 *
	 * A custom post type must also declare support for custom fields for registered meta to be accessible via REST. When registering complex meta values this argument may optionally be an array with 'schema' or 'prepare_callback' keys instead of a boolean.
	 *
	 * @var bool|array{
	 *     schema: mixed[],
	 *     prepare_callback: callable(mixed,\WP_REST_Request,mixed[]): mixed,
	 * }
	 */
	public $show_in_rest;
}
