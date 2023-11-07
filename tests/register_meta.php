<?php

declare(strict_types=1);

$args = new \Args\register_meta;

$args->object_subtype = 'page';
$args->object_subtype = 'article';
$args->object_subtype = 'faq';

$args->type = $args::TYPE_STRING;
$args->type = $args::TYPE_BOOLEAN;
$args->type = $args::TYPE_INTEGER;
$args->type = $args::TYPE_NUMBER;
$args->type = $args::TYPE_ARRAY;
$args->type = $args::TYPE_OBJECT;

$args->description = 'Description';
$args->single = true;
$args->default = 123;

$args->sanitize_callback = fn( mixed $meta_value, string $meta_key, string $object_type, string $object_subtype ) => ( $meta_value );
$args->sanitize_callback = fn( mixed $meta_value, string $meta_key, string $object_type ) => ( $meta_value );
$args->sanitize_callback = fn( $meta_value ) => ( 123 );

$args->auth_callback = fn( bool $allowed, string $meta_key, string $object_type, string $object_subtype ) => ( $allowed );
$args->auth_callback = fn( bool $allowed, string $meta_key, string $object_type ) => ( false );
$args->auth_callback = fn( bool $allowed ) => ( true );
$args->auth_callback = '__return_false';

$args->show_in_rest = true;
$args->show_in_rest = false;
$args->show_in_rest = [
	'schema' => [
		'items' => [],
	],
	'prepare_callback' => fn( mixed $value, \WP_REST_Request $request, array $args ) => ( 123 ),
];
$args->revisions_enabled = true;
$args->revisions_enabled = false;
