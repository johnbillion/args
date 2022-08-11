<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Block_Type` class in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/WP_Block_Type/
 */
class WP_Block_Type extends Shared\Base {
	/**
	 * Block API version.
	 */
	public int $api_version;

	/**
	 * Human-readable block type label.
	 */
	public string $title;

	/**
	 * Block type category classification, used in search interfaces to arrange block types by category.
	 */
	public string $category;

	/**
	 * Setting parent lets a block require that it is only available when nested within the specified blocks.
	 *
	 * @var array<int, string>
	 */
	public array $parent;

	/**
	 * Setting ancestor makes a block available only inside the specified block types at any position of the ancestor's block subtree.
	 *
	 * @var array<int, string>
	 */
	public array $ancestor;

	/**
	 * Block type icon.
	 */
	public string $icon;

	/**
	 * A detailed block type description.
	 */
	public string $description;

	/**
	 * Additional keywords to produce block type as result in search interfaces.
	 *
	 * @var array<int, string>
	 */
	public array $keywords;

	/**
	 * The translation textdomain.
	 */
	public string $textdomain;

	/**
	 * Alternative block styles.
	 *
	 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
	 *
	 * @var array<int, array<string, mixed>>
	 * @phpstan-var array<int, array{
	 *   name: string,
	 *   label: string,
	 *   inline_style: string,
	 *   style_handle: string,
	 *   is_default: bool,
	 * }>
	 */
	public array $styles;

	/**
	 * Supported features.
	 *
	 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/
	 *
	 * @var array<string,mixed>
	 */
	public array $supports;

	/**
	 * Structured data for the block preview.
	 *
	 * @var array<string, array<string, mixed>>
	 */
	public array $example;

	/**
	 * Block type render callback.
	 *
	 * @var callable
	 * @phpstan-var callable(array<string, mixed>, string): string
	 */
	public $render_callback;

	/**
	 * Block type attributes property schemas.
	 *
	 * @var array<string, array<string, mixed>>
	 */
	public array $attributes;

	/**
	 * Context values inherited by blocks of this type.
	 *
	 * @var array<int, string>
	 */
	public array $uses_context;

	/**
	 * Context provided by blocks of this type.
	 *
	 * @var array<string, string>
	 */
	public array $provides_context;

	/**
	 * Block type editor script handle.
	 */
	public string $editor_script;

	/**
	 * Block type front end script handle.
	 */
	public string $script;

	/**
	 * Block type editor style handle.
	 */
	public string $editor_style;

	/**
	 * Block type front end style handle.
	 */
	public string $style;

	/**
	 * Block type front end only script handle.
	 */
	public string $view_script;

	/**
	 * Block variations.
	 *
	 * @var array<int, array<string, mixed>>
	 */
	public array $variations;
}
