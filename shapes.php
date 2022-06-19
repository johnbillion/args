#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$shapes = json_decode( (string) file_get_contents( __DIR__ . '/composer.json' ), true )['extra']['args-shapes'];

foreach ( $shapes as $shape ) {
	$output = null;
	$result = null;

	// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.system_calls_exec
	exec(
		sprintf(
			'composer test:shape -- %s',
			$shape
		),
		$output,
		$result
	);

	if ( 0 !== $result ) {
		echo implode( "\n", $output ) . "\n";
		exit( $result );
	}
}

$files = glob( __DIR__ . '/src/*.php' );

if ( $files === false || count( $files ) === 0 ) {
	echo 'No files found';
	exit( 1 );
}

$has_errors = false;

foreach ( $files as $file ) {
	$arg = basename( $file, '.php' );
	$txt = __DIR__ . '/tests/shapes/' . $arg . '.txt';
	if ( ! file_exists( $txt ) ) {
		printf(
			'There is no shape file for %1$s: %2$s' . "\n",
			$arg,
			$txt
		);
		exit( 1 );
	}
}
