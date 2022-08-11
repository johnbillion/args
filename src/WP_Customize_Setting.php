<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Customize_Setting::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_setting/__construct/
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */
class WP_Customize_Setting extends Shared\Base {
	public const TRANSPORT_REFRESH = 'refresh';
	public const TRANSPORT_POSTMESSAGE = 'postMessage';

	/**
	 * Type of the setting.
	 *
	 * Default 'theme_mod'.
	 */
	public string $type;

	/**
	 * Capability required for the setting.
	 *
	 * Default 'edit_theme_options'
	 */
	public string $capability;

	/**
	 * Theme features required to support the setting.
	 *
	 * @var string|array<int, mixed>
	 * @phpstan-var string|array{
	 *   0: string,
	 * }
	 */
	public $theme_supports;

	/**
	 * Default value for the setting.
	 *
	 * Default is empty string.
	 */
	public string $default;

	/**
	 * Options for rendering the live preview of changes in Customizer.
	 *
	 * Using 'refresh' makes the change visible by reloading the whole preview. Using 'postMessage' allows a custom JavaScript to handle live changes.
	 *
	 * Default is 'refresh'.
	 *
	 * @phpstan-var self::TRANSPORT_*
	 */
	public string $transport;

	/**
	 * Server-side validation callback for the setting's value.
	 *
	 * @var callable
	 * @phpstan-var callable(\WP_Error, mixed, \WP_Customize_Setting): \WP_Error
	 */
	public $validate_callback;

	/**
	 * Callback to filter a Customize setting value in un-slashed form.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed, \WP_Customize_Setting): mixed
	 */
	public $sanitize_callback;

	/**
	 * Callback to convert a Customize PHP setting value to a value that is JSON serializable.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed, \WP_Customize_Setting): mixed
	 */
	public $sanitize_js_callback;

	/**
	 * Whether or not the setting is initially dirty when created.
	 */
	public bool $dirty;
}
