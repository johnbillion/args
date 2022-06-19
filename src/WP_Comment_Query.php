<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Comment_Query::__construct()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_comment_query/__construct/
 */
class WP_Comment_Query extends Shared\Base implements DateQuery\WithArgs, MetaQuery\WithArgs {
	public const FIELD_IDS = 'ids';
	public const FIELD_ALL = '';

	public const HIERARCHICAL_FALSE = false;
	public const HIERARCHICAL_THREADED = 'threaded';
	public const HIERARCHICAL_FLAT = 'flat';

	use DateQuery\ProvidesArgs;
	use MetaQuery\ProvidesArgs;

	/**
	 * Comment author email address.
	 *
	 * Default empty.
	 */
	public string $author_email;

	/**
	 * Comment author URL.
	 *
	 * Default empty.
	 */
	public string $author_url;

	/**
	 * Array of author IDs to include comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $author__in;

	/**
	 * Array of author IDs to exclude comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $author__not_in;

	/**
	 * Array of comment IDs to include.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $comment__in;

	/**
	 * Array of comment IDs to exclude.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $comment__not_in;

	/**
	 * Whether to return a comment count (true) or array of comment objects (false).
	 *
	 * Default false.
	 */
	public bool $count;

	/**
	 * Comment fields to return. Accepts 'ids' for comment IDs only or empty for all fields.
	 *
	 * Default empty.
	 *
	 * @phpstan-var self::FIELD_*
	 */
	public string $fields;

	/**
	 * Array of IDs or email addresses of users whose unapproved comments will be returned by the query regardless of `$status`.
	 *
	 * Default empty.
	 *
	 * @var array<int,(int|string)>
	 */
	public array $include_unapproved;

	/**
	 * Karma score to retrieve matching comments for.
	 *
	 * Default empty.
	 */
	public int $karma;

	/**
	 * Maximum number of comments to retrieve.
	 *
	 * Default empty (no limit).
	 */
	public int $number;

	/**
	 * When used with `$number`, defines the page of results to return. When used with `$offset`, `$offset` takes precedence.
	 *
	 * Default 1.
	 */
	public int $paged;

	/**
	 * Number of comments to offset the query. Used to build `LIMIT` clause.
	 *
	 * Default 0.
	 */
	public int $offset;

	/**
	 * Whether to disable the `SQL_CALC_FOUND_ROWS` query.
	 *
	 * Default: true.
	 */
	public bool $no_found_rows;

	/**
	 * Field(s) to order comments by. To use 'meta_value' or 'meta_value_num', `$meta_key` must also be defined. To sort by a specific `$meta_query` clause, use that clause's array key. Accepts:
	 *
	 *   - 'comment_agent'
	 *   - 'comment_approved'
	 *   - 'comment_author'
	 *   - 'comment_author_email'
	 *   - 'comment_author_IP'
	 *   - 'comment_author_url'
	 *   - 'comment_content'
	 *   - 'comment_date'
	 *   - 'comment_date_gmt'
	 *   - 'comment_ID'
	 *   - 'comment_karma'
	 *   - 'comment_parent'
	 *   - 'comment_post_ID'
	 *   - 'comment_type'
	 *   - 'user_id'
	 *   - 'comment__in'
	 *   - 'meta_value'
	 *   - 'meta_value_num'
	 *   - the value of `$meta_key`
	 *   - the array keys of `$meta_query`
	 *   - an empty array or 'none' to disable `ORDER BY` clause.
	 *
	 * Default: 'comment_date_gmt'.
	 *
	 * @var string|array<int,string>
	 */
	public $orderby;

	/**
	 * How to order retrieved comments. Accepts 'ASC', 'DESC'.
	 *
	 * Default: 'DESC'.
	 *
	 * @phpstan-var Shared\Base::ORDER_*
	 */
	public string $order;

	/**
	 * Parent ID of comment to retrieve children of.
	 *
	 * Default empty.
	 */
	public int $parent;

	/**
	 * Array of parent IDs of comments to retrieve children for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $parent__in;

	/**
	 * Array of parent IDs of comments *not* to retrieve children for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $parent__not_in;

	/**
	 * Array of author IDs to retrieve comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $post_author__in;

	/**
	 * Array of author IDs *not* to retrieve comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $post_author__not_in;

	/**
	 * Limit results to those affiliated with a given post ID.
	 *
	 * Default 0.
	 */
	public int $post_id;

	/**
	 * Array of post IDs to include affiliated comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $post__in;

	/**
	 * Array of post IDs to exclude affiliated comments for.
	 *
	 * Default empty.
	 *
	 * @var array<int,int>
	 */
	public array $post__not_in;

	/**
	 * Post author ID to limit results by.
	 *
	 * Default empty.
	 */
	public int $post_author;

	/**
	 * Post status or array of post statuses to retrieve affiliated comments for. Pass 'any' to match any value.
	 *
	 * Default empty.
	 *
	 * @var string|array<int,string>
	 */
	public $post_status;

	/**
	 * Post type or array of post types to retrieve affiliated comments for. Pass 'any' to match any value.
	 *
	 * Default empty.
	 *
	 * @var string|array<int,string>
	 */
	public $post_type;

	/**
	 * Post name to retrieve affiliated comments for.
	 *
	 * Default empty.
	 */
	public string $post_name;

	/**
	 * Post parent ID to retrieve affiliated comments for.
	 *
	 * Default empty.
	 */
	public int $post_parent;

	/**
	 * Search term(s) to retrieve matching comments for.
	 *
	 * Default empty.
	 */
	public string $search;

	/**
	 * Comment statuses to limit results by. Accepts an array or space/comma-separated list of:
	 *
	 *   - 'hold' (`comment_status=0`)
	 *   - 'approve' (`comment_status=1`)
	 *   - 'all'
	 *   - a custom comment status
	 *
	 * Default 'all'.
	 *
	 * @var string|array<int,string>
	 */
	public $status;

	/**
	 * Include comments of a given type, or array of types. Accepts:
	 *
	 *   - 'comment'
	 *   - 'pings' (includes 'pingback' and 'trackback')
	 *   - any custom type string
	 *
	 * Default empty.
	 *
	 * @var string|array<int,string>
	 */
	public $type;

	/**
	 * Include comments from a given array of comment types.
	 *
	 * Default empty.
	 *
	 * @var array<int,string>
	 */
	public array $type__in;

	/**
	 * Exclude comments from a given array of comment types.
	 *
	 * Default empty.
	 *
	 * @var array<int,string>
	 */
	public array $type__not_in;

	/**
	 * Include comments for a specific user ID.
	 *
	 * Default empty.
	 */
	public int $user_id;

	/**
	 * Whether to include comment descendants in the results.
	 *
	 *   - 'threaded' returns a tree, with each comment's children stored in a `children` property on the `WP_Comment` object.
	 *   - 'flat' returns a flat array of found comments plus their children.
	 *   - Boolean `false` leaves out descendants.
	 *
	 * The parameter is ignored (forced to `false`) when `$fields` is 'ids' or 'counts'.
	 *
	 * Default: false.
	 *
	 * @var false|string
	 * @phpstan-var self::HIERARCHICAL_*
	 */
	public $hierarchical;

	/**
	 * Unique cache key to be produced when this query is stored in an object cache.
	 *
	 * Default is 'core'.
	 */
	public string $cache_domain;

	/**
	 * Whether to prime the metadata cache for found comments.
	 *
	 * Default true.
	 */
	public bool $update_comment_meta_cache;

	/**
	 * Whether to prime the cache for comment posts.
	 *
	 * Default false.
	 */
	public bool $update_comment_post_cache;

	/**
	 * Currently unused.
	 */
	protected int $ID;

	/**
	 * Currently unused.
	 */
	protected int $post_ID;
}
