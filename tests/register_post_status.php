<?php

declare(strict_types=1);

$args = new \Args\register_post_status;

$args->label = 'Redacted';
$args->label_count = _n_noop( 'Redacted', 'Redacted' );
$args->exclude_from_search = true;
$args->public = true;
$args->internal = true;
$args->protected = true;
$args->private = true;
$args->publicly_queryable = true;
$args->show_in_admin_all_list = true;
$args->show_in_admin_status_list = true;
$args->date_floating = true;
