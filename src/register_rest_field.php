<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `register_rest_field()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/register_rest_field/
 */
class register_rest_field extends Shared\Base {
	/**
	 * The callback function used to retrieve the field value.
	 *
	 * Default is 'null', the field will not be returned in the response. The function will be passed the prepared object data.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed[],string,\WP_REST_Request): mixed
	 */
	public $get_callback;

	/**
	 * The callback function used to set and update the field value.
	 *
	 * Default is 'null', the value cannot be set or updated. The function will be passed the model object, like `WP_Post`.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed,object,string,\WP_REST_Request,string): mixed
	 */
	public $update_callback;

	/**
	 * The schema for this field.
	 *
	 * Default is 'null', no schema entry will be returned.
	 *
	 * @var mixed[]
	 */
	public array $schema;
}
