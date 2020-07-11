<?php

declare(strict_types=1);

namespace Args;

/**
 * @property int $attachment_id Attachment post ID. Used for 'attachment' post_type.
 * @property int|string $author Author ID, or comma-separated list of IDs.
 * @property string $author_name User 'user_nicename'.
 * @property int[]|string[] $author__in An array of author IDs to query from.
 * @property int[]|string[] $author__not_in An array of author IDs not to query from.
 * @property bool $cache_results Whether to cache post information. Default true.
 * @property int|string $cat Category ID or comma-separated list of IDs (this or any children).
 * @property int[]|string[] $category__and An array of category IDs (AND in).
 * @property int[]|string[] $category__in An array of category IDs (OR in, no children).
 * @property int[]|string[] $category__not_in An array of category IDs (NOT in).
 * @property string $category_name Use category slug (not name, this or any children).
 * @property array|int $comment_count Filter results by comment count. Provide an integer to match comment count exactly. Provide an array with integer 'value' and 'compare' operator ('=', '!=', '>', '>=', '<', '<=' ) to compare against comment_count in a specific way.
 * @property string $comment_status Comment status.
 * @property int $comments_per_page The number of comments to return per page. Default 'comments_per_page' option.
 * @property array $date_query An associative array of WP_Date_Query arguments. See WP_Date_Query::__construct().
 * @property int $day Day of the month. Default empty. Accepts numbers 1-31.
 * @property bool $exact Whether to search by exact keyword. Default false.
 * @property string|array $fields Which fields to return. Single field or all fields (string), or array of fields. 'id=>parent' uses 'id' and 'post_parent'. Default all fields. Accepts 'ids', 'id=>parent'.
 * @property int $hour Hour of the day. Default empty. Accepts numbers 0-23.
 * @property int|bool $ignore_sticky_posts Whether to ignore sticky posts or not. Setting this to false excludes stickies from 'post__in'. Accepts 1|true, 0|false. Default false.
 * @property int $m Combination YearMonth. Accepts any four-digit year and month numbers 1-12. Default empty.
 * @property string $meta_compare Comparison operator to test the 'meta_value'.
 * @property string $meta_compare_key Comparison operator to test the 'meta_key'.
 * @property string $meta_key Custom field key.
 * @property array $meta_query An associative array of WP_Meta_Query arguments. See WP_Meta_Query.
 * @property string $meta_value Custom field value.
 * @property int $meta_value_num Custom field value number.
 * @property string $meta_type_key Cast for 'meta_key'. See WP_Meta_Query::construct().
 * @property int $menu_order The menu order of the posts.
 * @property int $monthnum The two-digit month. Default empty. Accepts numbers 1-12.
 * @property string $name Post slug.
 * @property bool $nopaging Show all posts (true) or paginate (false). Default false.
 * @property bool $no_found_rows Whether to skip counting the total rows found. Enabling can improve performance. Default false.
 * @property int $offset The number of posts to offset before retrieval.
 * @property string $order Designates ascending or descending order of posts. Default 'DESC'. Accepts 'ASC', 'DESC'.
 * @property string|array $orderby Sort retrieved posts by parameter. One or more options may be passed. To use 'meta_value', or 'meta_value_num', 'meta_key=keyname' must be also be defined. To sort by a specific `$meta_query` clause, use that clause's array key. Accepts 'none', 'name', 'author', 'date', 'title', 'modified', 'menu_order', 'parent', 'ID', 'rand', 'relevance', 'RAND(x)' (where 'x' is an integer seed value), 'comment_count', 'meta_value', 'meta_value_num', 'post__in', 'post_name__in', 'post_parent__in', and the array keys of `$meta_query`. Default is 'date', except when a search is being performed, when the default is 'relevance'.
 * @property int $p Post ID.
 * @property int $page Show the number of posts that would show up on page X of a static front page.
 * @property int $paged The number of the current page.
 * @property int $page_id Page ID.
 * @property string $pagename Page slug.
 * @property string $perm Show posts if user has the appropriate capability.
 * @property string $ping_status Ping status.
 * @property int[]|string[] $post__in An array of post IDs to retrieve, sticky posts will be included.
 * @property int[]|string[] $post__not_in An array of post IDs not to retrieve. Note: a string of comma-separated IDs will NOT work.
 * @property string $post_mime_type The mime type of the post. Used for 'attachment' post_type.
 * @property string[] $post_name__in An array of post slugs that results must match.
 * @property int $post_parent Page ID to retrieve child pages for. Use 0 to only retrieve top-level pages.
 * @property int[]|string[] $post_parent__in An array containing parent page IDs to query child pages from.
 * @property int[]|string[] $post_parent__not_in An array containing parent page IDs not to query child pages from.
 * @property string|string[] $post_type A post type slug (string) or array of post type slugs. Default 'any' if using 'tax_query'.
 * @property string|string[] $post_status A post status (string) or array of post statuses.
 * @property int $posts_per_page The number of posts to query for. Use -1 to request all posts.
 * @property int $posts_per_archive_page The number of posts to query for by archive page. Overrides 'posts_per_page' when is_archive(), or is_search() are true.
 * @property string $s Search keyword(s). Prepending a term with a hyphen will exclude posts matching that term. Eg, 'pillow -sofa' will return posts containing 'pillow' but not 'sofa'. The character used for exclusion can be modified using the the 'wp_query_search_exclusion_prefix' filter.
 * @property int $second Second of the minute. Default empty. Accepts numbers 0-60.
 * @property bool $sentence Whether to search by phrase. Default false.
 * @property bool $suppress_filters Whether to suppress filters. Default false.
 * @property string $tag Tag slug. Comma-separated (either), Plus-separated (all).
 * @property int[]|string[] $tag__and An array of tag IDs (AND in).
 * @property int[]|string[] $tag__in An array of tag IDs (OR in).
 * @property int[]|string[] $tag__not_in An array of tag IDs (NOT in).
 * @property int $tag_id Tag id or comma-separated list of IDs.
 * @property string[] $tag_slug__and An array of tag slugs (AND in).
 * @property string[] $tag_slug__in An array of tag slugs (OR in). unless 'ignore_sticky_posts' is true. Note: a string of comma-separated IDs will NOT work.
 * @property array $tax_query An associative array of WP_Tax_Query arguments. See WP_Tax_Query->queries.
 * @property string $title Post title.
 * @property bool $update_post_meta_cache Whether to update the post meta cache. Default true.
 * @property bool $update_post_term_cache Whether to update the post term cache. Default true.
 * @property bool $lazy_load_term_meta Whether to lazy-load term meta. Setting to false will disable cache priming for term meta, so that each get_term_meta() call will hit the database. Defaults to the value of `$update_post_term_cache`.
 * @property int $w The week number of the year. Default empty. Accepts numbers 0-53.
 * @property int $year The four-digit year. Default empty. Accepts any four-digit year.
 */
class WP_Query extends \Arrayy\Arrayy {
	protected $checkPropertyTypes = true;
	protected $checkPropertiesMismatch = true;
}
