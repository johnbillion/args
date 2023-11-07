<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Term_Query` class in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
 */
class WP_Term_Query extends Shared\Base implements MetaQuery\WithArgs {
	public const FIELD_ALL = 'all';
	public const FIELD_ALL_WITH_OBJECT_ID = 'all_with_object_id';
	public const FIELD_IDS = 'ids';
	public const FIELD_TT_IDS = 'tt_ids';
	public const FIELD_NAMES = 'names';
	public const FIELD_SLUGS = 'slugs';
	public const FIELD_COUNT = 'count';
	public const FIELD_ID_PARENT = 'id=>parent';
	public const FIELD_ID_NAME = 'id=>name';
	public const FIELD_ID_SLUG = 'id=>slug';

	use MetaQuery\ProvidesArgs;

	/**
	 * Taxonomy name, or array of taxonomies, to which results should be limited.
	 *
	 * @var string|array<int,string>
	 */
	public $taxonomy;

	/**
	 * Object ID, or array of object IDs. Results will be limited to terms associated with these objects.
	 *
	 * @var int|array<int,int>
	 */
	public $object_ids;

	/**
	 * Field(s) to order terms by.
	 *
	 * Accepts:
	 *
	 *   - Term fields ('name', 'slug', 'term_group', 'term_id', 'id',
	 *     'description', 'parent', 'term_order'). Unless `$object_ids`
	 *     is not empty, 'term_order' is treated the same as 'term_id'.
	 *   - 'count' to use the number of objects associated with the term.
	 *   - 'include' to match the 'order' of the $include param.
	 *   - 'slug__in' to match the 'order' of the $slug param.
	 *   - 'meta_value', 'meta_value_num'.
	 *   - The value of `$meta_key`.
	 *   - The array keys of `$meta_query`.
	 *   - 'none' to omit the ORDER BY clause.
	 *
	 * Default 'name'.
	 */
	public string $orderby;

	/**
	 * Whether to order terms in ascending or descending order. Accepts 'ASC' (ascending) or 'DESC' (descending).
	 *
	 * Default 'ASC'.
	 *
	 * @phpstan-var Shared\Base::ORDER_*
	 */
	public string $order;

	/**
	 * Whether to hide terms not assigned to any posts.
	 *
	 * Default true.
	 */
	public bool $hide_empty;

	/**
	 * Array of term IDs to include.
	 *
	 * @var array<int,int>
	 */
	public array $include;

	/**
	 * Array of term IDs to exclude. If `$include` is non-empty, `$exclude` is ignored.
	 *
	 * @var array<int,int>
	 */
	public array $exclude;

	/**
	 * Array of term IDs to exclude along with all of their descendant terms. If `$include` is non-empty, `$exclude_tree` is ignored.
	 *
	 * @var array<int,int>
	 */
	public array $exclude_tree;

	/**
	 * Maximum number of terms to return. Accepts 0 (all) or any positive number.
	 *
	 * Note that `$number` may not return accurate results when coupled with `$object_ids`. See #41796 for details.
	 *
	 * Default 0 (all).
	 *
	 * @phpstan-var positive-int | 0
	 */
	public int $number;

	/**
	 * The number by which to offset the terms query.
	 *
	 * @phpstan-var positive-int | 0
	 */
	public int $offset;

	/**
	 * Term fields to query for.
	 *
	 * Accepts:
	 *
	 *   - 'all' Returns an array of complete term objects (`WP_Term[]`).
	 *   - 'all_with_object_id' Returns an array of term objects
	 *     with the 'object_id' param (`WP_Term[]`). Works only
	 *     when the `$object_ids` parameter is populated.
	 *   - 'ids' Returns an array of term IDs (`int[]`).
	 *   - 'tt_ids' Returns an array of term taxonomy IDs (`int[]`).
	 *   - 'names' Returns an array of term names (`string[]`).
	 *   - 'slugs' Returns an array of term slugs (`string[]`).
	 *   - 'count' Returns the number of matching terms (`int`).
	 *   - 'id=>parent' Returns an associative array of parent term IDs,
	 *      keyed by term ID (`int[]`).
	 *   - 'id=>name' Returns an associative array of term names,
	 *      keyed by term ID (`string[]`).
	 *   - 'id=>slug' Returns an associative array of term slugs,
	 *      keyed by term ID (`string[]`).
	 *
	 * Default 'all'.
	 *
	 * @phpstan-var self::FIELD_*
	 */
	public string $fields;

	/**
	 * Whether to return a term count. If true, will take precedence over `$fields`.
	 *
	 * Default false.
	 */
	public bool $count;

	/**
	 * Name or array of names to return term(s) for.
	 *
	 * @var string|array<int,string>
	 */
	public $name;

	/**
	 * Slug or array of slugs to return term(s) for.
	 *
	 * @var string|array<int,string>
	 */
	public $slug;

	/**
	 * Term taxonomy ID, or array of term taxonomy IDs, to match when querying terms.
	 *
	 * @var int|array<int,int>
	 */
	public $term_taxonomy_id;

	/**
	 * Whether to include terms that have non-empty descendants (even if `$hide_empty` is set to true).
	 *
	 * Default true.
	 */
	public bool $hierarchical;

	/**
	 * Search criteria to match terms. Will be SQL-formatted with wildcards before and after.
	 */
	public string $search;

	/**
	 * Retrieve terms with criteria by which a term is LIKE `$name__like`.
	 */
	public string $name__like;

	/**
	 * Retrieve terms where the description is LIKE `$description__like`.
	 */
	public string $description__like;

	/**
	 * Whether to pad the quantity of a term's children in the quantity of each term's "count" object variable.
	 *
	 * Default false.
	 */
	public bool $pad_counts;

	/**
	 * Whether to return terms regardless of ancestry or whether the terms are empty. Accepts 'all' or empty (disabled).
	 *
	 * Default ''.
	 *
	 * @phpstan-var 'all' | ''
	 */
	public string $get;

	/**
	 * Term ID to retrieve child terms of. If multiple taxonomies are passed, `$child_of` is ignored.
	 */
	public int $child_of;

	/**
	 * Parent term ID to retrieve direct-child terms of.
	 */
	public int $parent;

	/**
	 * True to limit results to terms that have no children. This parameter has no effect on non-hierarchical taxonomies.
	 *
	 * Default false.
	 */
	public bool $childless;

	/**
	 * Unique cache key to be produced when this query is stored in an object cache.
	 *
	 * Default 'core'.
	 */
	public string $cache_domain;

	/**
	 * Whether to cache term information.
	 *
	 * Default true.
	 */
	public bool $cache_results;

	/**
	 * Whether to prime meta caches for matched terms.
	 *
	 * Default true.
	 */
	public bool $update_term_meta_cache;
}
