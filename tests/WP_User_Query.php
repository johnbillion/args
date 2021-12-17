<?php

declare(strict_types=1);

$args = new \Args\WP_User_Query;

$args->blog_id = 123;
$args->role = 'editor';
$args->role__in = [ 'subscriber' ];
$args->role__not_in = [ 'contributor' ];

$args->meta_key = 'key';
$args->meta_key = [ 'key', 'key' ];
$args->meta_value = 'value';
$args->meta_value = [ 'value', 'value' ];
$args->meta_compare = 'NOT IN';
$args->meta_compare_key = 'LIKE';
$args->meta_type = 'BINARY';
$args->meta_type_key = '';

$args->include = [ 123 ];
$args->exclude = [ 456 ];
$args->search = 'john';
$args->search_columns = [ 'user_login', 'user_email' ];
$args->orderby = 'user_login';
$args->order = 'DESC';
$args->offset = 5;
$args->number = 20;
$args->paged = 2;
$args->count_total = false;
$args->fields = 'all';
$args->fields = [ 'user_registered', 'user_email' ];
$args->who = 'authors';
$args->has_published_posts = true;
$args->has_published_posts = [ 'page' ];
$args->nicename = '';
$args->nicename__in = [ 'john' ];
$args->nicename__not_in = [ 'dave' ];
$args->login = 'john';
$args->login__in = [ 'john' ];
$args->login__not_in = [ 'dave' ];
