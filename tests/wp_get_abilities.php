<?php

declare(strict_types=1);

$args = new \Args\wp_get_abilities;

$args->category = 'content';
$args->namespace = 'my-plugin';
$args->meta = [
	'annotations' => [
		'readonly' => true,
	],
];
$args->item_include_callback = fn( \WP_Ability $ability ): bool => true;
$args->result_callback = fn( array $abilities ): array => array_slice( $abilities, 0, 10 );
