<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `register_taxonomy()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
class register_taxonomy extends Base {
	/**
	 * An array of labels for this taxonomy. By default, Tag labels are used for non-hierarchical taxonomies, and Category labels are used for hierarchical taxonomies. See accepted values in get_taxonomy_labels(). Default empty array.
	 *
	 * @var string[]
	 */
	public array $labels;

	/**
	 * A short descriptive summary of what the taxonomy is for. Default empty.
	 */
	public string $description;

	/**
	 * Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users. The default settings of `$publicly_queryable`, `$show_ui`, and `$show_in_nav_menus` are inherited from `$public`.
	 */
	public bool $public;

	/**
	 * Whether the taxonomy is publicly queryable. If not set, the default is inherited from `$public`
	 */
	public bool $publicly_queryable;

	/**
	 * Whether the taxonomy is hierarchical. Default false.
	 */
	public bool $hierarchical;

	/**
	 * Whether to generate and allow a UI for managing terms in this taxonomy in the admin. If not set, the default is inherited from `$public` (default true).
	 */
	public bool $show_ui;

	/**
	 * Whether to show the taxonomy in the admin menu. If true, the taxonomy is shown as a submenu of the object type menu. If false, no menu is shown. `$show_ui` must be true. If not set, default is inherited from `$show_ui` (default true).
	 */
	public bool $show_in_menu;

	/**
	 * Makes this taxonomy available for selection in navigation menus. If not set, the default is inherited from `$public` (default true).
	 */
	public bool $show_in_nav_menus;

	/**
	 * Whether to include the taxonomy in the REST API. Set this to true for the taxonomy to be available in the block editor.
	 */
	public bool $show_in_rest;

	/**
	 * To change the base url of REST API route. Default is $taxonomy.
	 */
	public string $rest_base;

	/**
	 * REST API Controller class name. Default is 'WP_REST_Terms_Controller'.
	 */
	public string $rest_controller_class;

	/**
	 * Whether to list the taxonomy in the Tag Cloud Widget controls. If not set, the default is inherited from `$show_ui` (default true).
	 */
	public bool $show_tagcloud;

	/**
	 * Whether to show the taxonomy in the quick/bulk edit panel. It not set, the default is inherited from `$show_ui` (default true).
	 */
	public bool $show_in_quick_edit;

	/**
	 * Whether to display a column for the taxonomy on its post type listing screens. Default false.
	 */
	public bool $show_admin_column;

	/**
	 * Provide a callback function for the meta box display. If not set, post_categories_meta_box() is used for hierarchical taxonomies, and post_tags_meta_box() is used for non-hierarchical. If false, no meta box is shown.
	 *
	 * @var bool|callable
	 */
	public $meta_box_cb;

	/**
	 * Callback function for sanitizing taxonomy data saved from a meta box. If no callback is defined, an appropriate one is determined based on the value of `$meta_box_cb`.
	 *
	 * @var callable
	 */
	public $meta_box_sanitize_cb;

	/**
	 * Array of capabilities for this taxonomy.
	 *
	 * @type string $manage_terms Default 'manage_categories'.
	 * @type string $edit_terms   Default 'manage_categories'.
	 * @type string $delete_terms Default 'manage_categories'.
	 * @type string $assign_terms Default 'edit_posts'.
	 *
	 * @var string[]
	 */
	public array $capabilities;

	/**
	 * Triggers the handling of rewrites for this taxonomy. Default true, using $taxonomy as slug.
	 *
	 * To prevent rewrite, set to false. To specify rewrite rules, an array can be passed with any of these keys:
	 *
	 * @type string $slug         Customize the permastruct slug. Default `$taxonomy` key.
	 * @type bool   $with_front   Should the permastruct be prepended with WP_Rewrite::$front. Default true.
	 * @type bool   $hierarchical Either hierarchical rewrite tag or not. Default false.
	 * @type int    $ep_mask      Assign an endpoint mask. Default `EP_NONE`.
	 *
	 * @var bool|array
	 */
	public $rewrite;

	/**
	 * Sets the query var key for this taxonomy. Default `$taxonomy` key. If false, a taxonomy cannot be loaded at `?{query_var}={term_slug}`. If a string, the query `?{query_var}={term_slug}` will be valid.
	 *
	 * @var string|bool
	 */
	public $query_var;

	/**
	 * Works much like a hook, in that it will be called when the count is updated. Default _update_post_term_count() for taxonomies attached to post types, which confirms that the objects are published before counting them. Default _update_generic_term_count() for taxonomies attached to other object types, such as users.
	 *
	 * @var callable
	 */
	public $update_count_callback;

	/**
	 * Default term to be used for the taxonomy.
	 *
	 * @type string $name         Name of default term.
	 * @type string $slug         Slug for default term. Default empty.
	 * @type string $description  Description for default term. Default empty.
	 *
	 * @var string|array
	 */
	public $default_term;

	/**
	 * Whether terms in this taxonomy should be sorted in the order they are provided to `wp_set_object_terms()`. Default null which equates to false.
	 */
	public bool $sort;

	/**
	 * Array of arguments to automatically use inside `wp_get_object_terms()` for this taxonomy.
	 */
	public array $args;

}
