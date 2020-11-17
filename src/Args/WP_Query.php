<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Query` class in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_query/parse_query/
 */
class WP_Query extends Base {

	/**
	 * Attachment post ID. Used for 'attachment' post_type.
	 */
	public int $attachment_id;

	/**
	 * Author ID, or comma-separated list of IDs.
	 *
	 * @var int|string
	 */
	public $author;

	/**
	 * User 'user_nicename'.
	 */
	public string $author_name;

	/**
	 * An array of author IDs to query from.
	 *
	 * @var array<int, int>
	 */
	public array $author__in;

	/**
	 * An array of author IDs not to query from.
	 *
	 * @var array<int, int>
	 */
	public array $author__not_in;

	/**
	 * Whether to cache post information. Default true.
	 */
	public bool $cache_results;

	/**
	 * Category ID or comma-separated list of IDs (this or any children).
	 *
	 * @var int|string
	 */
	public $cat;

	/**
	 * An array of category IDs (AND in).
	 *
	 * @var array<int, int>
	 */
	public array $category__and;

	/**
	 * An array of category IDs (OR in, no children).
	 *
	 * @var array<int, int>
	 */
	public array $category__in;

	/**
	 * An array of category IDs (NOT in).
	 *
	 * @var array<int, int>
	 */
	public array $category__not_in;

	/**
	 * Use category slug (not name, this or any children).
	 */
	public string $category_name;

	/**
	 * Filter results by comment count. Provide an integer to match comment count exactly. Provide an array with integer 'value' and 'compare' operator ('=', '!=', '>', '>=', '<', '<=' ) to compare against comment_count in a specific way.
	 *
	 * @var array|int
	 */
	public $comment_count;

	/**
	 * Comment status.
	 */
	public string $comment_status;

	/**
	 * The number of comments to return per page. Default 'comments_per_page' option.
	 */
	public int $comments_per_page;

	/**
	 * An associative array of WP_Date_Query arguments. See WP_Date_Query::__construct().
	 */
	public array $date_query;

	/**
	 * Day of the month. Default empty. Accepts numbers 1-31.
	 */
	public int $day;

	/**
	 * Whether to search by exact keyword. Default false.
	 */
	public bool $exact;

	/**
	 * Which fields to return. Single field or all fields (string), or array of fields. 'id=>parent' uses 'id' and 'post_parent'. Default all fields. Accepts 'ids', 'id=>parent'.
	 *
	 * @var string|array<int, string>
	 */
	public $fields;

	/**
	 * Hour of the day. Default empty. Accepts numbers 0-23.
	 */
	public int $hour;

	/**
	 * Whether to ignore sticky posts or not. Setting this to false excludes stickies from 'post__in'. Default false.
	 */
	public bool $ignore_sticky_posts;

	/**
	 * Combination YearMonth. Accepts any four-digit year and month numbers 1-12. Default empty.
	 */
	public int $m;

	/**
	 * Comparison operator to test the 'meta_value'.
	 */
	public string $meta_compare;

	/**
	 * Comparison operator to test the 'meta_key'.
	 */
	public string $meta_compare_key;

	/**
	 * Custom field key.
	 */
	public string $meta_key;

	/**
	 * An associative array of WP_Meta_Query arguments. See WP_Meta_Query.
	 */
	public array $meta_query;

	/**
	 * Custom field value.
	 */
	public string $meta_value;

	/**
	 * Custom field value number.
	 */
	public int $meta_value_num;

	/**
	 * Cast for 'meta_key'. See WP_Meta_Query::construct().
	 */
	public string $meta_type_key;

	/**
	 * The menu order of the posts.
	 */
	public int $menu_order;

	/**
	 * The two-digit month. Default empty. Accepts numbers 1-12.
	 */
	public int $monthnum;

	/**
	 * Post slug.
	 */
	public string $name;

	/**
	 * Show all posts (true) or paginate (false). Default false.
	 */
	public bool $nopaging;

	/**
	 * Whether to skip counting the total rows found. Enabling can improve performance. Default false.
	 */
	public bool $no_found_rows;

	/**
	 * The number of posts to offset before retrieval.
	 */
	public int $offset;

	/**
	 * Designates ascending or descending order of posts. Default 'DESC'. Accepts 'ASC', 'DESC'.
	 */
	public string $order;

	/**
	 * Sort retrieved posts by parameter. One or more options may be passed. To use 'meta_value', or 'meta_value_num', 'meta_key=keyname' must be also be defined. To sort by a specific `$meta_query` clause, use that clause's array key. Accepts 'none', 'name', 'author', 'date', 'title', 'modified', 'menu_order', 'parent', 'ID', 'rand', 'relevance', 'RAND(x)' (where 'x' is an integer seed value), 'comment_count', 'meta_value', 'meta_value_num', 'post__in', 'post_name__in', 'post_parent__in', and the array keys of `$meta_query`. Default is 'date', except when a search is being performed, when the default is 'relevance'.
	 *
	 * @var string|array
	 */
	public $orderby;

	/**
	 * Post ID.
	 */
	public int $p;

	/**
	 * Show the number of posts that would show up on page X of a static front page.
	 */
	public int $page;

	/**
	 * The number of the current page.
	 */
	public int $paged;

	/**
	 * Page ID.
	 */
	public int $page_id;

	/**
	 * Page slug.
	 */
	public string $pagename;

	/**
	 * Show posts if user has the appropriate capability.
	 */
	public string $perm;

	/**
	 * Ping status.
	 */
	public string $ping_status;

	/**
	 * An array of post IDs to retrieve, sticky posts will be included.
	 *
	 * @var array<int, int>
	 */
	public array $post__in;

	/**
	 * An array of post IDs not to retrieve. Note: a string of comma-separated IDs will NOT work.
	 *
	 * @var array<int, int>
	 */
	public array $post__not_in;

	/**
	 * The mime type of the post. Used for 'attachment' post_type.
	 */
	public string $post_mime_type;

	/**
	 * An array of post slugs that results must match.
	 *
	 * @var array<int, string>
	 */
	public array $post_name__in;

	/**
	 * Page ID to retrieve child pages for. Use 0 to only retrieve top-level pages.
	 */
	public int $post_parent;

	/**
	 * An array containing parent page IDs to query child pages from.
	 *
	 * @var array<int, int>
	 */
	public array $post_parent__in;

	/**
	 * An array containing parent page IDs not to query child pages from.
	 *
	 * @var array<int, int>
	 */
	public array $post_parent__not_in;

	/**
	 * A post type slug (string) or array of post type slugs. Default 'any' if using 'tax_query'.
	 *
	 * @var string|array<int, string>
	 */
	public $post_type;

	/**
	 * A post status (string) or array of post statuses.
	 *
	 * @var string|array<int, string>
	 */
	public $post_status;

	/**
	 * The number of posts to query for. Use -1 to request all posts.
	 */
	public int $posts_per_page;

	/**
	 * The number of posts to query for by archive page. Overrides 'posts_per_page' when is_archive(), or is_search() are true.
	 */
	public int $posts_per_archive_page;

	/**
	 * Search keyword(s). Prepending a term with a hyphen will exclude posts matching that term. Eg, 'pillow -sofa' will return posts containing 'pillow' but not 'sofa'. The character used for exclusion can be modified using the the 'wp_query_search_exclusion_prefix' filter.
	 */
	public string $s;

	/**
	 * Second of the minute. Default empty. Accepts numbers 0-60.
	 */
	public int $second;

	/**
	 * Whether to search by phrase. Default false.
	 */
	public bool $sentence;

	/**
	 * Whether to suppress filters. Default false.
	 */
	public bool $suppress_filters;

	/**
	 * Tag slug. Comma-separated (either), Plus-separated (all).
	 */
	public string $tag;

	/**
	 * An array of tag IDs (AND in).
	 *
	 * @var array<int, int>
	 */
	public array $tag__and;

	/**
	 * An array of tag IDs (OR in).
	 *
	 * @var array<int, int>
	 */
	public array $tag__in;

	/**
	 * An array of tag IDs (NOT in).
	 *
	 * @var array<int, int>
	 */
	public array $tag__not_in;

	/**
	 * Tag id or comma-separated list of IDs.
	 */
	public int $tag_id;

	/**
	 * An array of tag slugs (AND in).
	 *
	 * @var array<int, string>
	 */
	public array $tag_slug__and;

	/**
	 * An array of tag slugs (OR in). unless 'ignore_sticky_posts' is true. Note: a string of comma-separated IDs will NOT work.
	 *
	 * @var array<int, string>
	 */
	public array $tag_slug__in;

	/**
	 * An associative array of WP_Tax_Query arguments. See WP_Tax_Query->queries.
	 */
	public array $tax_query;

	/**
	 * Post title.
	 */
	public string $title;

	/**
	 * Whether to update the post meta cache. Default true.
	 */
	public bool $update_post_meta_cache;

	/**
	 * Whether to update the post term cache. Default true.
	 */
	public bool $update_post_term_cache;

	/**
	 * Whether to lazy-load term meta. Setting to false will disable cache priming for term meta, so that each get_term_meta() call will hit the database. Defaults to the value of `$update_post_term_cache`.
	 */
	public bool $lazy_load_term_meta;

	/**
	 * The week number of the year. Default empty. Accepts numbers 0-53.
	 */
	public int $w;

	/**
	 * The four-digit year. Default empty. Accepts any four-digit year.
	 */
	public int $year;

}
