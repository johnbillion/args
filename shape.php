#!/usr/bin/env php
<?php

declare(strict_types=1);

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Project;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * @var array{
 *   file?: string,
 *   method?: string,
 *   function?: string,
 *   param?: string,
 * } $options
 */
$options = getopt( '', [
	'file:',
	'method::',
	'function::',
	'param:',
] );

if ( ! isset( $options['file'], $options['param'] ) || ( ! isset( $options['method'] ) && ! isset( $options['function'] ) ) ) {
	echo
		<<<'USAGE'
Usage:
  $ composer test:shape -- --file=vendor/wordpress/wordpress/wp-includes/class-wp-query.php --method="\WP_Query::parse_query()" --param=query
  $ composer test:shape -- --file=vendor/wordpress/wordpress/wp-includes/post.php --function="\register_post_type()" --param=args

USAGE;
	exit( 1 );
}

if ( ! file_exists( $options['file'] ) ) {
	throw new \RuntimeException(
		sprintf(
			'The file "%s" does not exist.' . "\n",
			$options['file']
		)
	);
}
$projectFactory = \phpDocumentor\Reflection\Php\ProjectFactory::createInstance();
$projectFiles = [
	new \phpDocumentor\Reflection\File\LocalFile( $options['file'] ),
];

/** @var Project $project */
$project = $projectFactory->create( 'My Project', $projectFiles );

$files = $project->getFiles();

if ( ! isset( $files[ $options['file'] ] ) ) {
	throw new \RuntimeException(
		sprintf(
			'The file "%s" could not be loaded.' . "\n",
			$options['file']
		)
	);
}

$file = $files[ $options['file'] ];

if ( isset( $options['method'] ) ) {
	list( $oc, $om ) = explode( '::', $options['method'] );

	$classes = $file->getClasses();

	if ( ! isset( $classes[ $oc ] ) ) {
		throw new \RuntimeException(
			sprintf(
				'The class "%s" could not be found.' . "\n",
				$oc
			)
		);
	}

	$methods = $classes[ $oc ]->getMethods();

	if ( ! isset( $methods[ $options['method'] ] ) ) {
		throw new \RuntimeException(
			sprintf(
				'The method "%s" could not be found.' . "\n",
				$options['method']
			)
		);
	}

	$symbol = $methods[ $options['method'] ];
	$name = $oc;
} elseif ( isset( $options['function'] ) ) {
	$functions = $file->getFunctions();

	if ( ! isset( $functions[ $options['function'] ] ) ) {
		throw new \RuntimeException(
			sprintf(
				'The function "%s" could not be found.' . "\n",
				$options['function']
			)
		);
	}

	$symbol = $functions[ $options['function'] ];
	$name = trim( $options['function'], '()' );
} else {
	throw new \RuntimeException(
		'No function or method provided'
	);
}

$docBlock = $symbol->getDocBlock();

if ( $docBlock === null ) {
	throw new \RuntimeException(
		'Function docblock not found'
	);
}

$tags = $docBlock->getTags();

/** @var Param[] $tags */
$tags = array_values( array_filter( $tags, function( Tag $tag ) : bool {
	return ( $tag instanceof Param );
} ) );

$params = array_values( array_filter( $tags, function( Param $tag ) use ( $options ) : bool {
	return (string) $tag->getVariableName() === $options['param'];
} ) );

if ( count( $params ) === 0 ) {
	throw new \RuntimeException(
		sprintf(
			'The parameter "$%s" could not be found.' . "\n",
			$options['param']
		)
	);
}

$desc = (string) $params[0]->getDescription();
$desc = trim( $desc, '{}' );
$desc = explode( '@type', $desc );
$desc = array_map( 'trim', $desc );

unset( $desc[0] );

$desc = array_map( function( string $string ) : array {
	return (array) preg_split( '#\s+#', $string, 3 );
}, $desc );

usort( $desc, function( $a, $b ): int {
	return $a[1] <=> $b[1];
} );

$desc = array_map( function( array $item ) : string {
	$type = $item[0];
	$name = $item[1];

	return sprintf(
		'%1$s %2$s',
		$type,
		$name
	);
}, $desc );

file_put_contents( __DIR__ . '/tests/shapes/' . trim( $name, '\\' ) . '.txt', implode( "\n", $desc ) . "\n" );
