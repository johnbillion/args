<?php

declare(strict_types=1);

$args = new \Args\register_post_type;

$args->menu_icon = 'dashicons-foo';
$args->rest_controller_class = stdClass::class;
$args->capability_type = [ 'page', 'pages' ];
$args->capabilities = [
	'read' => 'foo',
	'what' => 'foo',
];
$args->template_lock = 'all';
