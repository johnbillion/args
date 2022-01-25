#!/usr/bin/env php
<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$shapes = json_decode( file_get_contents( __DIR__ . '/composer.json' ), true )['extra']['args-shapes'];

foreach ( $shapes as $shape ) {
	$output = null;
	$result = null;

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

foreach ( glob( __DIR__ . '/src/*.php' ) as $arg ) {
	$arg = basename( $arg, '.php' );
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
