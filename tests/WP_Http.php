<?php

declare(strict_types=1);

$args = new \Args\WP_Http;

$args->method = 'OPTIONS';
$args->timeout = 7;
$args->redirection = 2;
$args->httpversion = '1.1';
$args->user_agent = 'Args';
$args->reject_unsafe_urls = true;
$args->blocking = false;
$args->headers = '';
$args->cookies = [];
$args->body = 'Hello';
$args->compress = true;
$args->decompress = true;
$args->sslverify = true;
$args->sslcertificates = '';
$args->stream = false;
$args->filename = '';
$args->limit_response_size = 1024;
