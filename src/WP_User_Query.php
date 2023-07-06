<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_User_Query::prepare_query()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_user_query/prepare_query/
 */
class WP_User_Query extends Shared\Base implements MetaQuery\WithArgs {
	public const FIELD_ID = 'ID';
	public const FIELD_LOGIN = 'user_login';
	public const FIELD_EMAIL = 'user_email';
	public const FIELD_URL = 'user_url';
	public const FIELD_NICENAME = 'user_nicename';
	public const FIELD_DISPLAY_NAME = 'display_name';
	public const FIELD_REGISTERED = 'user_registered';

	public const SEARCH_COLUMN_ID = self::FIELD_ID;
	public const SEARCH_COLUMN_LOGIN = self::FIELD_LOGIN;
	public const SEARCH_COLUMN_EMAIL = self::FIELD_EMAIL;
	public const SEARCH_COLUMN_URL = self::FIELD_URL;
	public const SEARCH_COLUMN_NICENAME = self::FIELD_NICENAME;
	public const SEARCH_COLUMN_DISPLAY_NAME = self::FIELD_DISPLAY_NAME;

	public const WHO_ALL = '';
	public const WHO_AUTHORS = 'authors';

	use MetaQuery\ProvidesArgs;

	/**
	 * The site ID.
	 *
	 * Default is the current site.
	 */
	public int $blog_id;

	/**
	 * An array or a comma-separated list of role names that users must match to be included in results. Note that this is an inclusive list: users must match *each* role.
	 *
	 * Default empty.
	 *
	 * @var string|array<int,string>
	 */
	public $role;

	/**
	 * An array of role names. Matched users must have at least one of these roles.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $role__in;

	/**
	 * An array of role names to exclude. Users matching one or more of these roles will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $role__not_in;

	/**
	 * An array of user IDs to include.
	 *
	 * Default empty array.
	 *
	 * @var array<int,int>
	 */
	public array $include;

	/**
	 * An array of user IDs to exclude.
	 *
	 * Default empty array.
	 *
	 * @var array<int,int>
	 */
	public array $exclude;

	/**
	 * Search keyword. Searches for possible string matches on columns. When `$search_columns` is left empty, it tries to determine which column to search in based on search string.
	 *
	 * Default empty.
	 */
	public string $search;

	/**
	 * Array of column names to be searched. Accepts 'ID', 'user_login', 'user_email', 'user_url', 'user_nicename', 'display_name'.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 * @phpstan-var array<int,self::SEARCH_COLUMN_*>
	 */
	public array $search_columns;

	/**
	 * Field(s) to sort the retrieved users by.
	 *
	 * May be a single value, an array of values, or a multi-dimensional array with fields as keys and orders ('ASC' or 'DESC') as values. Accepted values are:
	 *
	 *   - 'ID', 'display_name' (or 'name')
	 *   - 'include'
	 *   - 'user_login' (or 'login')
	 *   - 'login__in'
	 *   - 'user_nicename' (or 'nicename')
	 *   - 'nicename__in'
	 *   - 'user_email (or 'email')
	 *   - 'user_url' (or 'url')
	 *   - 'user_registered' (or 'registered')
	 *   - 'post_count'
	 *   - 'meta_value'
	 *   - 'meta_value_num'
	 *   - the value of `$meta_key`
	 *   - or an array key of `$meta_query`.
	 *
	 * To use 'meta_value' or 'meta_value_num', `$meta_key` must be also be defined.
	 *
	 * Default 'user_login'.
	 *
	 * @var string|mixed[]
	 */
	public $orderby;

	/**
	 * Designates ascending or descending order of users. Order values passed as part of an `$orderby` array take precedence over this parameter. Accepts 'ASC', 'DESC'.
	 *
	 * Default 'ASC'.
	 *
	 * @phpstan-var Shared\Base::ORDER_*
	 */
	public string $order;

	/**
	 * Number of users to offset in retrieved results. Can be used in conjunction with pagination.
	 *
	 * Default 0.
	 */
	public int $offset;

	/**
	 * Number of users to limit the query for. Can be used in conjunction with pagination. Value -1 (all) is supported, but should be used with caution on larger sites.
	 *
	 * Default -1 (all users).
	 */
	public int $number;

	/**
	 * When used with number, defines the page of results to return.
	 *
	 * Default 1.
	 */
	public int $paged;

	/**
	 * Whether to count the total number of users found. If pagination is not needed, setting this to false can improve performance.
	 *
	 * Default true.
	 */
	public bool $count_total;

	/**
	 * Which fields to return. Single or all fields (string), or array of fields.
	 *
	 * Accepts:
	 *
	 *   - 'ID'
	 *   - 'display_name'
	 *   - 'user_login'
	 *   - 'user_nicename'
	 *   - 'user_email'
	 *   - 'user_url'
	 *   - 'user_registered'
	 *
	 * Use 'all' for all fields and 'all_with_meta' to include meta fields.
	 *
	 * Default 'all'.
	 *
	 * @var string|array<int, string>
	 * @phpstan-var (self::FIELD_*|'all'|'all_with_meta')|array<int,(self::FIELD_*)>
	 */
	public $fields;

	/**
	 * Type of users to query. Accepts 'authors'.
	 *
	 * Default empty (all users).
	 *
	 * @phpstan-var self::WHO_*
	 */
	public string $who;

	/**
	 * Pass an array of post types to filter results to users who have published posts in those post types.
	 *
	 * `true` is an alias for all public post types.
	 *
	 * @var true|array<int,string>
	 */
	public $has_published_posts;

	/**
	 * The user nicename.
	 *
	 * Default empty.
	 */
	public string $nicename;

	/**
	 * An array of nicenames to include. Users matching one of these nicenames will be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $nicename__in;

	/**
	 * An array of nicenames to exclude. Users matching one of these nicenames will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $nicename__not_in;

	/**
	 * The user login.
	 *
	 * Default empty.
	 */
	public string $login;

	/**
	 * An array of logins to include. Users matching one of these logins will be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $login__in;

	/**
	 * An array of logins to exclude. Users matching one of these logins will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $login__not_in;

	/**
	 * Whether to cache user information.
	 *
	 * Default true.
	 */
	public bool $cache_results;

	/**
	 * An array or a comma-separated list of capability names that users must match to be included in results.
	 *
	 * Note that this is an inclusive list: users must match *each* capability.
	 *
	 * Does NOT work for capabilities not in the database or filtered via {@see 'map_meta_cap'}.
	 *
	 * @var string|array<int,string>
	 */
	public $capability;

	/**
	 * An array of capability names. Matched users must have at least one of these capabilities.
	 *
	 * Does NOT work for capabilities not in the database or filtered via {@see 'map_meta_cap'}.
	 *
	 * @var array<int,string>
	 */
	public array $capability__in;

	/**
	 * An array of capability names to exclude. Users matching one or more of these capabilities will not be included in results.
	 *
	 * Does NOT work for capabilities not in the database or filtered via {@see 'map_meta_cap'}.
	 *
	 * @var array<int,string>
	 */
	public array $capability__not_in;
}
