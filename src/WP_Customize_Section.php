<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Customize_Section::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_section/__construct/
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */
class WP_Customize_Section extends Shared\Base {
	/**
	 * Priority of the section, defining the display order of panels and sections.
	 *
	 * Default 160.
	 */
	public int $priority;

	/**
	 * The panel this section belongs to (if any).
	 *
	 * Default empty.
	 */
	public string $panel;

	/**
	 * Capability required for the section.
	 *
	 * Default 'edit_theme_options'
	 */
	public string $capability;

	/**
	 * Theme features required to support the section.
	 *
	 * @var string|array<int, mixed>
	 * @phpstan-var string|array{
	 *   0: string,
	 * }
	 */
	public $theme_supports;

	/**
	 * Title of the section to show in UI.
	 */
	public string $title;

	/**
	 * Description to show in the UI.
	 */
	public string $description;

	/**
	 * Type of the section.
	 */
	public string $type;

	/**
	 * Active callback.
	 *
	 * @phpstan-var callable(\WP_Customize_Section): bool
	 */
	public $active_callback;

	/**
	 * Hide the description behind a help icon, instead of inline above the first control.
	 *
	 * Default false.
	 */
	public bool $description_hidden;
}
