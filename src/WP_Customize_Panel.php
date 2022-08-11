<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Customize_Panel::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_panel/__construct/
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */
class WP_Customize_Panel extends Shared\Base {
	/**
	 * Priority of the panel, defining the display order of panels and sections. Default 160.
	 */
	public int $priority;

	/**
	 * Capability required for the panel. Default `edit_theme_options`.
	 */
	public string $capability;

	/**
	 * Theme features required to support the panel.
	 *
	 * @var string|array<int, mixed>
	 * @phpstan-var string|array{
	 *   0: string,
	 * }
	 */
	public $theme_supports;

	/**
	 * Title of the panel to show in UI.
	 */
	public string $title;

	/**
	 * Description to show in the UI.
	 */
	public string $description;

	/**
	 * Type of the panel.
	 */
	public string $type;

	/**
	 * Active callback.
	 *
	 * @phpstan-var callable(\WP_Customize_Panel): bool
	 */
	public $active_callback;
}
