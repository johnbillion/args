#!/usr/bin/env php
<?php

declare(strict_types=1);

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Project;

// Don't show deprecated errors
error_reporting( E_ALL & ~E_DEPRECATED );

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

/**
 * @var array<string, string>
 * @phpstan-var array{
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
  $ composer generate -- --file=vendor/wordpress/wordpress/wp-includes/class-wp-query.php --method="\WP_Query::parse_query()" --param=query
  $ composer generate -- --file=vendor/wordpress/wordpress/wp-includes/post.php --function="\register_post_type()" --param=args

USAGE;
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
$project = $projectFactory->create( 'My Project', $projectFiles );

$files = $project->getFiles();

if ( ! isset( $files[ $options['file'] ] ) ) {
	printf(
		'The file "%s" could not be loaded.' . "\n",
		$options['file']
	);
	exit( 1 );
}

$file = $files[ $options['file'] ];

if ( isset( $options['method'] ) ) {
	list( $oc, $om ) = explode( '::', $options['method'] );

	$classes = $file->getClasses();

	if ( ! isset( $classes[ $oc ] ) ) {
		printf(
			'The class "%s" could not be found.' . "\n",
			$oc
		);
		exit( 1 );
	}

	$methods = $classes[ $oc ]->getMethods();

	if ( ! isset( $methods[ $options['method'] ] ) ) {
		printf(
			'The method "%s" could not be found.' . "\n",
			$options['method']
		);
		exit( 1 );
	}

	$symbol = $methods[ $options['method'] ];
	$name = $oc;
} elseif ( isset( $options['function'] ) ) {
	$functions = $file->getFunctions();

	if ( ! isset( $functions[ $options['function'] ] ) ) {
		printf(
			'The function "%s" could not be found.' . "\n",
			$options['function']
		);
		exit( 1 );
	}

	$symbol = $functions[ $options['function'] ];
	$name = trim( $options['function'], '()' );
} else {
	echo 'No function or method provided';
	exit( 1 );
}

$docBlock = $symbol->getDocBlock();

if ( $docBlock === null ) {
	echo 'Function docblock not found';
	exit( 1 );
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
	printf(
		'The parameter "$%s" could not be found.' . "\n",
		$options['param']
	);
	exit( 1 );
}

$desc = (string) $params[0]->getDescription();
$desc = trim( $desc, '{}' );
$desc = explode( '@type', $desc );
$desc = array_map( 'trim', $desc );

unset( $desc[0] );

$desc = array_map( function( string $string ) : array {
	return (array) preg_split( '#\s+#', $string, 3 );
}, $desc );

$desc = array_map( function( array $item ) : string {
	$description = preg_replace( '#\n\s+#', ' ', (string) $item[2] );
	$type = $item[0];
	$name = $item[1];

	return sprintf(
		<<<'BLOCK'
	/**
	 * %1$s
	 */
	public %2$s %3$s;
BLOCK,
		$description,
		$type,
		$name
	);
}, $desc );

$composer_file = dirname( __DIR__ ) . '/composer.json';
$composer_contents = (string) file_get_contents( $composer_file );
$composer = json_decode( $composer_contents, true );

if ( isset( $options['method'] ) ) {
	$composer['extra']['args-shapes'][] = sprintf(
		'--method="%1$s" --param=%2$s --file=%3$s',
		$options['method'],
		$options['param'],
		$options['file']
	);
} else {
	$composer['extra']['args-shapes'][] = sprintf(
		'--function="%1$s" --param=%2$s --file=%3$s',
		$options['function'],
		$options['param'],
		$options['file']
	);
}

$composer['extra']['args-shapes'] = array_unique( $composer['extra']['args-shapes'] );

sort( $composer['extra']['args-shapes'] );

$json = json_encode( $composer, JSON_UNESCAPED_SLASHES );

if ( is_string( $json ) ) {
	$printer = new \Ergebnis\Json\Printer\Printer();
	$printed = $printer->print(
		$json,
		"\t"
	);
	file_put_contents( $composer_file, $printed . "\n" );
}

$data = '<?php' . "\n\n" . 'declare(strict_types=1);' . "\n\n" . 'namespace Args;' . "\n\n" . 'class ' . trim( $name, '\\' ) . ' extends Shared\Base {' . "\n" . implode( "\n\n", $desc ) . "\n}\n";

$src_target = dirname( __DIR__ ) . '/src/' . trim( $name, '\\' ) . '.php';

file_put_contents( $src_target, $data );

$data = '<?php' . "\n\n" . 'declare(strict_types=1);' . "\n\n" . '$args = new \Args' . $name . ';' . "\n";

$tests_target = dirname( __DIR__ ) . '/tests/' . trim( $name, '\\' ) . '.php';

file_put_contents( $tests_target, $data );

echo $src_target . "\n";
