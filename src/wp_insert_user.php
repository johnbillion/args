<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `wp_insert_user()` function in WordPress.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_insert_user/
 */
class wp_insert_user extends Shared\Base {
	/**
	 * User ID. If supplied, the user will be updated.
	 */
	public int $ID;

	/**
	 * The plain-text user password.
	 */
	public string $user_pass;

	/**
	 * The user's login username.
	 */
	public string $user_login;

	/**
	 * The URL-friendly user name.
	 */
	public string $user_nicename;

	/**
	 * The user URL.
	 */
	public string $user_url;

	/**
	 * The user email address.
	 */
	public string $user_email;

	/**
	 * The user's display name.
	 *
	 * Default is the user's username.
	 */
	public string $display_name;

	/**
	 * The user's nickname.
	 *
	 * Default is the user's username.
	 */
	public string $nickname;

	/**
	 * The user's first name. For new users, will be used to build the first part of the user's display name if `$display_name` is not specified.
	 */
	public string $first_name;

	/**
	 * The user's last name. For new users, will be used to build the second part of the user's display name if `$display_name` is not specified.
	 */
	public string $last_name;

	/**
	 * The user's biographical description.
	 */
	public string $description;

	/**
	 * Whether to enable the rich-editor for the user. Accepts 'true' or 'false' as a string literal, not boolean.
	 *
	 * Default 'true'.
	 *
	 * @phpstan-var 'true'|'false'
	 */
	public string $rich_editing;

	/**
	 * Whether to enable the rich code editor for the user. Accepts 'true' or 'false' as a string literal, not boolean.
	 *
	 * Default 'true'.
	 *
	 * @phpstan-var 'true'|'false'
	 */
	public string $syntax_highlighting;

	/**
	 * Whether to enable comment moderation keyboard shortcuts for the user. Accepts 'true' or 'false' as a string literal, not boolean.
	 *
	 * Default 'false'.
	 *
	 * @phpstan-var 'true'|'false'
	 */
	public string $comment_shortcuts;

	/**
	 * Admin color scheme for the user.
	 *
	 * Default 'fresh'.
	 */
	public string $admin_color;

	/**
	 * Whether the user should always access the admin over https.
	 *
	 * Default false.
	 */
	public bool $use_ssl;

	/**
	 * Date the user registered. Format is 'Y-m-d H:i:s'.
	 */
	public string $user_registered;

	/**
	 * Password reset key.
	 *
	 * Default empty.
	 */
	public string $user_activation_key;

	/**
	 * Multisite only. Whether the user is marked as spam.
	 *
	 * Default false.
	 */
	public bool $spam;

	/**
	 * Whether to display the Admin Bar for the user on the site's front end. Accepts 'true' or 'false' as a string literal, not boolean.
	 *
	 * Default 'true'.
	 *
	 * @phpstan-var 'true'|'false'
	 */
	public string $show_admin_bar_front;

	/**
	 * User's role.
	 */
	public string $role;

	/**
	 * User's locale.
	 *
	 * Default empty.
	 */
	public string $locale;

	/**
	 * Array of user meta values keyed by their meta key.
	 *
	 * Default empty.
	 *
	 * @var array<string,mixed>
	 */
	public array $meta_input;
}
