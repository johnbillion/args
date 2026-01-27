<?php

declare(strict_types=1);

$args = new \Args\WP_Abilities_Registry;

$args->label = 'My Ability';
$args->description = 'Does something useful';
$args->category = 'content';
$args->execute_callback = fn( mixed $input = null ) => $input;
$args->permission_callback = fn( mixed $input = null ) => true;
$args->input_schema = [
	'type' => 'object',
	'properties' => [
		'name' => [
			'type' => 'string',
		],
	],
];
$args->output_schema = [
	'type' => 'string',
];
$args->meta = [
	'annotations' => [
		'readonly' => true,
		'destructive' => false,
		'idempotent' => true,
	],
	'show_in_rest' => true,
];
$args->ability_class = 'WP_Ability';
