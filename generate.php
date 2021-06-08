#!/usr/bin/env php
<?php

use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Project;

require_once __DIR__ . '/vendor/autoload.php';

$options = getopt( '', [
	"file:",
	"method::",
	"function::",
	"param:",
] );

if ( empty( $options['file'] ) || ( empty( $options['method'] ) && empty( $options['function'] ) ) || empty( $options['param'] ) ) {
	printf(
		<<<'USAGE'
Usage:
  $ php -f %1$s --file=vendor/wordpress/wordpress/wp-includes/class-wp-query.php --method="\WP_Query::parse_query()" --param=query
  $ php -f %1$s --file=vendor/wordpress/wordpress/wp-includes/post.php --function="\register_post_type()" --param=args

USAGE,
		$argv[0]
	);
	exit( 1 );
}

if ( ! file_exists( $options['file'] ) ) {
	printf(
		'The file "%s" does not exist.' . "\n",
		$options['file']
	);
	exit( 1 );
}

$projectFactory = \phpDocumentor\Reflection\Php\ProjectFactory::createInstance();
$projectFiles = [
	new \phpDocumentor\Reflection\File\LocalFile( $options['file'] ),
];

/** @var Project $project */
$project = $projectFactory->create('My Project', $projectFiles);

$file = $project->getFiles()[ $options['file'] ];

if ( ! empty( $options['method'] ) ) {
	list( $oc, $om ) = explode( '::', $options['method'] );

	$class = $file->getClasses()[ $oc ];
	$symbol = $class->getMethods()[ $options['method'] ];
	$name = $oc;
} else {
	$symbol = $file->getFunctions()[ $options['function'] ];
	$name = trim( $options['function'], '()' );
}

$tags = $symbol->getDocBlock()->getTags();

/** @var BaseTag[] $tags */
$tags = array_values( array_filter( $tags, function( BaseTag $tag ) : bool {
	return ( $tag instanceof Param );
} ) );

/** @var Param[] $tags */
$tags = array_values( array_filter( $tags, function( Param $tag ) use ( $options ) : bool {
	return (string) $tag->getVariableName() === $options['param'];
} ) );

$desc = (string) $tags[0]->getDescription();
$desc = trim( $desc, '{' );
$desc = trim( $desc, '}' );
$desc = explode( '@type', $desc );
$desc = array_map( 'trim', $desc );

$desc = array_map( function( string $string ) : array {
	return preg_split( '#\s+#', $string, 3 );
}, $desc );

$desc = array_map( function( array $item ) : string {
	$item[2] = preg_replace( '#\n\s+#', ' ', $item[2] );

	return sprintf(
		<<<'BLOCK'
	/**
	 * %1$s
	 */
	public %2$s %3$s;
BLOCK,
		$item[2],
		$item[0],
		$item[1]
	);
}, $desc );

$desc = 'class ' . trim( $name, '\\' ) . ' extends Base {' . "\n" . implode( "\n\n", $desc ) . "\n}\n";

echo $desc;
