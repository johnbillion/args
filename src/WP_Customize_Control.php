<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Customize_Control::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_control/__construct/
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */
class WP_Customize_Control extends Shared\Base {
	/**
	 * Order in which this instance was created in relation to other instances.
	 */
	public int $instance_number;

	/**
	 * Customizer bootstrap instance.
	 */
	public \WP_Customize_Manager $manager;

	/**
	 * Control ID.
	 */
	public string $id;

	/**
	 * All settings tied to the control.
	 *
	 * If undefined, `$id` will be used.
	 *
	 * @var array<string, mixed>
	 */
	public array $settings;

	/**
	 * The primary setting for the control (if there is one).
	 *
	 * Default 'default'.
	 */
	public string $setting;

	/**
	 * Capability required to use this control.
	 *
	 * Normally this is empty and the capability is derived from `$settings`.
	 */
	public string $capability;

	/**
	 * Order priority to load the control.
	 *
	 * Default 10.
	 */
	public int $priority;

	/**
	 * Section the control belongs to.
	 *
	 * Default empty.
	 */
	public string $section;

	/**
	 * Label for the control.
	 *
	 * Default empty.
	 */
	public string $label;

	/**
	 * Description for the control.
	 *
	 * Default empty.
	 */
	public string $description;

	/**
	 * List of choices for 'radio' or 'select' type controls, where values are the keys, and labels are the values.
	 *
	 * Default empty array.
	 *
	 * @var array<string, string>
	 */
	public array $choices;

	/**
	 * List of custom input attributes for control output, where attribute names are the keys and values are the values.
	 *
	 * Not used for 'checkbox', 'radio', 'select', 'textarea', or 'dropdown-pages' control types.
	 *
	 * Default empty array.
	 *
	 * @var array<string, string>
	 */
	public array $input_attrs;

	/**
	 * Show UI for adding new content, currently only used for the dropdown-pages control.
	 *
	 * Default false.
	 */
	public bool $allow_addition;

	/**
	 * Deprecated. Use `WP_Customize_Control::json()` instead.
	 *
	 * @var array<string, mixed>
	 */
	protected array $json;

	/**
	 * Control type.
	 *
	 * Core controls include 'text', 'checkbox', 'textarea', 'radio', 'select', and 'dropdown-pages'. Additional input types such as 'email', 'url', 'number', 'hidden', and 'date' are supported implicitly.
	 *
	 * Default 'text'.
	 */
	public string $type;

	/**
	 * Active callback.
	 *
	 * @var callable
	 * @phpstan-var callable(\WP_Customize_Control): bool
	 */
	public $active_callback;
}
