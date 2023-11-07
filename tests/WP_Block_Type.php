<?php

declare(strict_types=1);

$args = new \Args\WP_Block_Type;

$args->api_version = 2;
$args->title = 'Title';
$args->category = 'Category';
$args->parent = [
	'core/paragraph',
	'core/image',
];
$args->ancestor = [
	'core/paragraph',
	'core/image',
];
$args->icon = 'icon';
$args->description = 'Description';
$args->keywords = [
	'one',
	'two',
];
$args->textdomain = 'textdomain';
$args->styles = [
	[
		'name' => 'default',
		'label' => 'default',
	],
	[
		'name' => 'light',
		'label' => 'light',
	],
];
$args->supports = [
	'html' => false,
];
$args->example = [
	'attributes' => [
		'align' => 'left',
	],
];
$args->render_callback = function( array $atts, string $content, WP_Block $block = null ) {
	return $content;
};
$args->attributes = [
	'align' => [
		'type' => 'string',
		'default' => 'left',
	],
];
$args->uses_context = [
	'align',
];
$args->provides_context = [
	'foo' => 'foo',
];
$args->block_hooks = [
	'core/one' => 'before',
	'core/two' => 'after',
	'core/three' => 'first_child',
	'core/four' => 'last_child',
];
$args->editor_script_handles = [
	'wp-handle',
];
$args->script_handles = [
	'wp-handle',
];
$args->selectors = [
	'border' => '.wp-block-image img',
	'filter' => [
		'duotone' => '.wp-block-image img, .wp-block-image',
	],
];
$args->editor_style_handles = [
	'wp-handle',
];
$args->style_handles = [
	'wp-handle',
];
$args->view_script_handles = [
	'wp-handle',
];
$args->variations = [
	[
		'name' => 'error',
		'title' => 'Error',
		'description' => 'Shows error.',
		'keywords' => [
			'failure',
		],
	],
];
