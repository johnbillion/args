<?php

declare(strict_types=1);

$args = new \Args\WP_Http;

$args->method = 'GET';
$args->method = 'POST';
$args->method = 'HEAD';
$args->method = 'PUT';
$args->method = 'DELETE';
$args->method = 'TRACE';
$args->method = 'OPTIONS';
$args->method = 'PATCH';

$args->method = $args::METHOD_GET;
$args->method = $args::METHOD_POST;
$args->method = $args::METHOD_HEAD;
$args->method = $args::METHOD_PUT;
$args->method = $args::METHOD_DELETE;
$args->method = $args::METHOD_TRACE;
$args->method = $args::METHOD_OPTIONS;
$args->method = $args::METHOD_PATCH;

$args->timeout = 7;
$args->redirection = 2;
$args->httpversion = '1.1';
$args->user_agent = 'Args';
$args->reject_unsafe_urls = true;
$args->blocking = false;
$args->headers = [
	'Foo: Bar',
];
$args->cookies = [];
$args->body = 'Hello';
$args->compress = true;
$args->decompress = true;
$args->sslverify = true;
$args->sslcertificates = '';
$args->stream = false;
$args->filename = '';
$args->limit_response_size = 1024;
