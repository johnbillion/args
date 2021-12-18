<?php

declare(strict_types=1);

$args = new \Args\WP_Query;

$args->attachment_id = 123;

$args->author = 1;
$args->author = '1,2,3';

$args->author_name = 'john';
$args->author__in = [ 1, 2, 3 ];
$args->author__not_in = [ 1, 2, 3 ];
$args->cache_results = true;
$args->cat = 1;
$args->cat = '1,2,3';

$args->category__and = [ 1, 2, 3 ];
$args->category__in = [ 1, 2, 3 ];
$args->category__not_in = [ 1, 2, 3 ];
$args->category_name = 'category';

$args->comment_count = 10;
$args->comment_count = [
	'value' => 10,
	'compare' => '>=',
];
$args->comment_count = [
	'value' => 123,
	'compare' => $args::COMMENT_COUNT_COMPARE_LESS_THAN_OR_EQUALS,
];

$args->comment_status = 'open';
$args->comment_status = 'closed';
$args->comment_status = $args::COMMENT_STATUS_OPEN;
$args->comment_status = $args::COMMENT_STATUS_CLOSED;

$args->comments_per_page = 10;
$args->date_query->column = 'foo';
$args->date_query->relation = 'OR';

$args->day = 25;
$args->exact = false;

$args->fields = '';
$args->fields = 'ids';
$args->fields = 'id=>parent';

$args->hour = 12;
$args->ignore_sticky_posts = true;
$args->m = 2;

$args->meta_key = 'key';
$args->meta_key = [ 'key', 'key' ];
$args->meta_value = 'value';
$args->meta_value = [ 'value', 'value' ];
$args->meta_compare = 'NOT IN';
$args->meta_compare_key = 'LIKE';
$args->meta_type = 'BINARY';
$args->meta_type_key = '';

$clause1 = new \Args\Shared\MetaQueryClause;
$clause1->key = 'foo';

$clause2 = new \Args\Shared\MetaQueryClause;
$clause2->key = 'bar';

$args->meta_query->clauses['one'] = $clause1;
$args->meta_query->addClause( $clause2 );
$args->meta_query->relation = $args->meta_query::META_QUERY_RELATION_AND;

$args->menu_order = 0;
$args->minute = 59;
$args->monthnum = 10;
$args->name = '';
$args->nopaging = true;
$args->no_found_rows = true;
$args->offset = 1;
$args->order = 'ASC';
$args->orderby = '';
$args->p = 1;
$args->page = 4;
$args->paged = 9;
$args->page_id = 14;
$args->pagename = '';
$args->perm = 'editable';

$args->ping_status = 'open';
$args->ping_status = 'closed';
$args->ping_status = $args::COMMENT_STATUS_OPEN;
$args->ping_status = $args::COMMENT_STATUS_CLOSED;

$args->post__in = [ 1, 2 ];
$args->post__not_in = [ 1, 2 ];
$args->post_mime_type = '';
$args->post_name__in = [ 'hello' ];
$args->post_parent = 9;
$args->post_parent__in = [ 2 ];
$args->post_parent__not_in = [ 2 ];
$args->post_type = '';
$args->post_status = '';
$args->posts_per_page = 90;
$args->posts_per_archive_page = -1;
$args->s = 'helo';
$args->second = 30;
$args->sentence = true;
$args->suppress_filters = false;
$args->tag = '';
$args->tag__and = [ 1, 2, 3 ];
$args->tag__in = [ 1, 2, 3 ];
$args->tag__not_in = [ 1, 2, 3 ];
$args->tag_id = 123;
$args->tag_slug__and = [ 'hello' ];
$args->tag_slug__in = [ 'hello' ];

$clause1 = new \Args\Shared\TaxQueryClause;
$clause1->taxonomy = 'foo';

$args->tax_query->addClause( $clause1 );

$args->title = '';
$args->update_post_meta_cache = true;
$args->update_post_term_cache = true;
$args->lazy_load_term_meta = true;
$args->w = 7;
$args->year = 1984;
