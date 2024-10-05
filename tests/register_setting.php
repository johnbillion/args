<?php

declare(strict_types=1);

$args = new \Args\register_setting;

$args->type = $args::TYPE_STRING;
$args->label = 'A label of the data attached to this setting.';
$args->description = 'A description of the data attached to this setting.';
$args->sanitize_callback = function ( int $value, string $option_name, mixed $args ) {
	return $value;
};
$args->show_in_rest = true;
$args->default = 'default value';
