<?php

declare(strict_types=1);

use Args\Shared\DateQueryClause;

$args = new \Args\WP_Comment_Query;

$args->author_email = 'foo@example.org';
$args->author_url = 'http://example.net';
$args->author__in = [ 123 ];
$args->author__not_in = [ 456 ];
$args->comment__in = [ 123 ];
$args->comment__not_in = [ 234 ];
$args->count = true;

$args->date_query->relation = 'AND';
$args->date_query->clauses[] = DateQueryClause::fromArray( [
	'year' => date( 'Y' ),
] );

$args->fields = 'ids';
$args->include_unapproved = [ 123, 'user@example.com' ];
$args->karma = 5;

$args->meta_key = 'key';
$args->meta_key = [ 'key', 'key' ];
$args->meta_value = 'value';
$args->meta_value = [ 'value', 'value' ];
$args->meta_compare = 'NOT IN';
$args->meta_compare_key = 'LIKE';
$args->meta_type = 'BINARY';
$args->meta_type_key = '';

$args->number = 25;
$args->paged = 3;
$args->offset = 99;
$args->no_found_rows = true;
$args->orderby = 'comment_ID';
$args->order = 'DESC';
$args->parent = 11;
$args->parent__in = [ 22 ];
$args->parent__not_in = [ 33 ];
$args->post_author__in = [ 44 ];
$args->post_author__not_in = [ 55 ];
$args->post_id = 66;
$args->post__in = [ 77 ];
$args->post__not_in = [ 88 ];
$args->post_author = 99;
$args->post_status = 'publish';
$args->post_type = 'page';
$args->post_name = 'foo';
$args->post_parent = 11;
$args->search = 'Hello, World!';
$args->status = 'approve';
$args->status = 'all';
$args->type = 'comment';
$args->type__in = [ 'comment' ];
$args->type__not_in = [ 'trackback' ];
$args->user_id = 300;
$args->hierarchical = 'flat';
$args->hierarchical = false;
$args->cache_domain = 'hello';
$args->update_comment_meta_cache = true;
$args->update_comment_post_cache = true;
