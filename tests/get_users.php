<?php

declare(strict_types=1);

$args = new \Args\get_users;

$args->blog_id = 123;
$args->role = 'editor';
$args->role__in = [ 'subscriber' ];
$args->role__not_in = [ 'contributor' ];
$args->meta_key = 'foo';
$args->meta_value = 'bar';
$args->meta_compare = '>=';
$args->include = [ 123 ];
$args->exclude = [ 456 ];
$args->search = 'john';
$args->search_columns = [ 'user_login' ];
$args->orderby = '';
$args->order = '';
$args->offset = '';
$args->number = '';
$args->paged = '';
$args->count_total = '';
$args->fields = '';
$args->who = '';
$args->has_published_posts = '';
$args->nicename = '';
$args->nicename__in = '';
$args->nicename__not_in = '';
$args->login = '';
$args->login__in = '';
$args->login__not_in = '';
