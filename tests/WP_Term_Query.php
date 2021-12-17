<?php

declare(strict_types=1);

$args = new \Args\WP_Term_Query;

$args->taxonomy = 'category';
$args->taxonomy = 'post_tag';

$args->object_ids = [ 123 ];
$args->orderby = 'name';
$args->order = $args::ORDER_ASC;
$args->order = $args::ORDER_DESC;
$args->hide_empty = true;
$args->include = [ 123 ];
$args->exclude = [ 456 ];
$args->exclude_tree = [ 789 ];
$args->number = 5;
$args->offset = 2;
$args->fields = $args::FIELD_ALL;
$args->count = false;
$args->name = 'foo';
$args->slug = 'bar';
$args->term_taxonomy_id = 33;
$args->hierarchical = false;
$args->search = 'Hello';
$args->name__like = 'foo';
$args->description__like = 'bar';
$args->pad_counts = true;
$args->get = '';
$args->get = 'all';
$args->child_of = 55;
$args->parent = 88;
$args->childless = false;
$args->cache_domain = '';
$args->update_term_meta_cache = true;

$args->meta_key = 'key';
$args->meta_key = [ 'key', 'key' ];
$args->meta_value = 'value';
$args->meta_value = [ 'value', 'value' ];
$args->meta_compare = 'NOT IN';
$args->meta_compare_key = 'LIKE';
$args->meta_type = 'BINARY';
$args->meta_type_key = '';
