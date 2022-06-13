<?php

declare(strict_types=1);

$args = new \Args\register_taxonomy;

$args->public = true;
$args->rest_controller_class = WP_REST_Controller::class;
$args->capabilities = [
	'manage_terms' => 'foo',
	'edit_terms' => 'foo',
	'delete_terms' => 'foo',
	'assign_terms' => 'foo',
];
$args->default_term = [
	'name' => 'Foo',
	'slug' => 'foo',
];
$args->default_term = 'Foo';
$args->meta_box_cb = function( \WP_Post $post, array $args ) {};
$args->meta_box_sanitize_cb = function( string $taxonomy, $terms ) {
	return [
		123,
		'abc',
	];
};
$args->rewrite = [
	'hierarchical' => false,
];
$args->update_count_callback = function( array $terms, \WP_Taxonomy $taxonomy ) {};
$args->labels = [
	'filter_by_item' => 'Filter by Item',
];
