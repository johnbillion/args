<?php

declare(strict_types=1);

$args = new \Args\wp_insert_user;

$args->ID = 123;
$args->user_pass = 'hunter2';
$args->user_login = 'john';
$args->user_nicename = 'john';
$args->user_url = 'https://example.org';
$args->user_email = 'john@example.net';
$args->display_name = 'John Smith';
$args->nickname = 'JS';
$args->first_name = 'John';
$args->last_name = 'Smith';
$args->description = 'Hello';
$args->rich_editing = 'true';
$args->rich_editing = 'false';
$args->syntax_highlighting = 'true';
$args->syntax_highlighting = 'false';
$args->comment_shortcuts = 'true';
$args->comment_shortcuts = 'false';
$args->admin_color = 'modern';
$args->use_ssl = true;
$args->user_registered = '2020-02-20 20:02:20';
$args->user_activation_key = '123';
$args->spam = false;
$args->show_admin_bar_front = 'true';
$args->show_admin_bar_front = 'false';
$args->role = 'editor';
$args->locale = 'en_GB';
$args->meta_input = [];
