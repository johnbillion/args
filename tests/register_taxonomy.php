<?php

declare(strict_types=1);

$args = new \Args\register_taxonomy;

$args->public = true;
$args->rest_controller_class = WP_REST_Controller::class;
$args->capabilities = [
	'read' => 'foo',
	'what' => 'foo',
];
