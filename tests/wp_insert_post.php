<?php

declare(strict_types=1);

$args = new \Args\wp_insert_post;

$args->ID = 123;
$args->post_author = 456;
$args->post_date = '2001-01-01 01:01:01';
$args->post_date_gmt = '2001-01-01 01:01:01';
$args->post_content = '<p>Hello</p>';
$args->post_content_filtered = '';
$args->post_title = 'Title';
$args->post_excerpt = 'This <b>is great</b>.';
$args->post_status = 'draft';
$args->post_type = 'page';

$args->comment_status = 'open';
$args->comment_status = 'closed';
$args->comment_status = $args::COMMENT_STATUS_OPEN;
$args->comment_status = $args::COMMENT_STATUS_CLOSED;

$args->ping_status = 'open';
$args->ping_status = 'closed';
$args->ping_status = $args::COMMENT_STATUS_OPEN;
$args->ping_status = $args::COMMENT_STATUS_CLOSED;

$args->post_password = 'hunter2';
$args->post_name = 'hello-world';
$args->to_ping = 'http://example.org,http://example.net';
$args->pinged = 'http://example.com';
$args->post_parent = 123;
$args->menu_order = 0;
$args->post_mime_type = 'image/jpeg';
$args->guid = 'guid';
$args->post_category = [ 5 ];
$args->tags_input = [];
$args->tax_input = [];
$args->meta_input = [];
