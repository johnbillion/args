<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Customize_Manager::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_customize_manager/__construct/
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */
class WP_Customize_Manager extends Shared\Base {
	/**
	 * Changeset UUID, the `post_name` for the customize_changeset post containing the customized state.
	 *
	 * Defaults to `null` resulting in a UUID to be immediately generated. If `false` is provided, then then the changeset UUID will be determined during `after_setup_theme`: when the `customize_changeset_branching` filter returns false, then the default UUID will be that of the most recent `customize_changeset` post that has a status other than 'auto-draft', 'publish', or 'trash'. Otherwise, if changeset branching is enabled, then a random UUID will be used.
	 *
	 * @var null|string|false
	 */
	public $changeset_uuid;

	/**
	 * Theme to be previewed (for theme switch).
	 *
	 * Defaults to customize_theme or theme query params.
	 */
	public string $theme;

	/**
	 * Messenger channel.
	 *
	 * Defaults to customize_messenger_channel query param.
	 */
	public string $messenger_channel;

	/**
	 * If settings should be previewed.
	 *
	 * Defaults to true.
	 */
	public bool $settings_previewed;

	/**
	 * If changeset branching is allowed; otherwise, changesets are linear.
	 *
	 * Defaults to true.
	 */
	public bool $branching;

	/**
	 * If data from a changeset's autosaved revision should be loaded if it exists.
	 *
	 * Defaults to false.
	 */
	public bool $autosaved;
}
