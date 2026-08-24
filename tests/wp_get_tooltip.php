<?php

declare(strict_types=1);

$args = new \Args\wp_get_tooltip;

$args->id = 'my-tooltip';
$args->button = '<button type="button">Help</button>';
$args->label = 'Help';
$args->close_label = 'Close';
$args->icon = 'dashicons-editor-help';
$args->class = 'my-tooltip-wrapper';
