<?php

declare(strict_types=1);

$args = new \Args\wp_insert_term;

$args->alias_of = 'foo';
$args->description = 'Bar';
$args->parent = 5;
$args->slug = 'bar';
