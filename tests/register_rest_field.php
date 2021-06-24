<?php

declare(strict_types=1);

$args = new \Args\register_rest_field;

$args->get_callback = fn( array $prepared, string $field_name, \WP_REST_Request $request ) => ( $prepared );
$args->get_callback = fn( array $prepared ) => 'Hello';

$args->update_callback = fn( mixed $result, object $object, string $field_name, \WP_REST_Request $request, string $type ) => ( $result );
$args->update_callback = fn( mixed $result ) => 42;

$args->schema = [];
