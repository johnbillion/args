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
	 * The callback is called here: https://github.com/WordPress/wordpress-develop/blob/6.6.0/src/wp-includes/rest-api/endpoints/class-wp-rest-controller.php#L434-L440
	 *
	 * @var callable
	 * @phpstan-var callable(mixed[],string,\WP_REST_Request,string): mixed
	 */
	public $get_callback;

	/**
	 * The callback function used to set and update the field value.
	 *
	 * Default is 'null', the value cannot be set or updated. The function will be passed the model object, like `WP_Post`.
	 *
	 * The callback is called here: https://github.com/WordPress/wordpress-develop/blob/6.6.0/src/wp-includes/rest-api/endpoints/class-wp-rest-controller.php#L468-L475
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
