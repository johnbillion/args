<?php

declare(strict_types=1);

$args = new \Args\wp_die;

$args->response = 418;
$args->link_url = 'http://example.net';
$args->link_text = 'Text';
$args->back_link = true;
$args->text_direction = 'rtl';
$args->text_direction = 'ltr';
$args->charset = 'windows-1252';
$args->code = 'foo';
$args->exit = true;
