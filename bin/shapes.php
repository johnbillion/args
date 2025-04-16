#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Args\ShapeTests;

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Project;
use ReflectionClass;
use ReflectionProperty;

// Don't show deprecated errors
error_reporting( E_ALL & ~E_DEPRECATED );

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

$shapes = json_decode( (string) file_get_contents( dirname( __DIR__ ) . '/composer.json' ), true )['extra']['args-shapes'];

/**
 * @phpstan-param array{
 *   file?: string,
 *   method?: string,
 *   function?: string,
 *   param?: string,
 * } $options
 * @throws \RuntimeException
 */
function test_shape( array $options ): void {
	if ( ! isset( $options['file'], $options['param'] ) ) {
		throw new \RuntimeException( 'No file or parameter provided' );
	}

	if ( ! isset( $options['method'] ) && ! isset( $options['function'] ) ) {
		throw new \RuntimeException( 'No method or function provided' );
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
		list( $oc ) = explode( '::', $options['method'] );

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
	$desc = explode( "\n    @type", $desc );
	$desc = array_map( 'trim', $desc );

	unset( $desc[0] );

	$desc = array_map( function( string $string ) : array {
		return (array) preg_split( '#\s+#', $string, 3 );
	}, $desc );

	usort( $desc, function( $a, $b ): int {
		return $a[1] <=> $b[1];
	} );

	$desc = array_map( function( array $item ): string {
		return sprintf(
			'%1$s %2$s',
			$item[0],
			$item[1]
		);
	}, $desc );

	file_put_contents( dirname( __DIR__ ) . '/tests/shapes/' . trim( $name, '\\' ) . '.txt', implode( "\n", $desc ) . "\n" );
}

foreach ( $shapes as $shape ) {
	test_shape( $shape );
}

$files = glob( dirname( __DIR__ ) . '/src/*.php' );

if ( $files === false || count( $files ) === 0 ) {
	throw new \RuntimeException( 'No files found' );
}

$has_errors = false;

foreach ( $files as $file ) {
	$arg = basename( $file, '.php' );
	$txt = dirname( __DIR__ ) . '/tests/shapes/' . $arg . '.txt';
	$class = "\Args\\{$arg}";

	if ( ! file_exists( $txt ) ) {
		throw new \RuntimeException(
			sprintf(
				'There is no shape file for %1$s: %2$s' . "\n",
				$arg,
				$txt
			)
		);
	}

	if ( ! class_exists( $class ) ) {
		throw new \RuntimeException(
			sprintf(
				'Class %s does not exist' . "\n",
				$class
			)
		);
	}

	$contents = trim( (string) file_get_contents( $txt ) );

	if ( strlen( $contents ) === 0 ) {
		continue;
	}

	$expected = explode( "\n", $contents );
	$expected_params = [];

	foreach ( $expected as $param ) {
		list( $type, $name ) = explode( ' $', $param );
		$expected_params[] = $name;
	}

	$object = new ReflectionClass( $class );

	/** @var \Args\Shared\Base $instance */
	$instance = new $class();
	$props = array_map( function( ReflectionProperty $prop ) : string {
		return $prop->getName();
	}, $object->getProperties() );
	$map = $instance->getMap();
	$expected_params = array_diff( $expected_params, array_values( $map ) );
	$expected_params = array_merge( array_values( $expected_params ), array_keys( $map ) );
	$missing = array_diff( $expected_params, $props );

	if ( count( $props ) === 0 ) {
		printf(
			'No properties found in %1$s' . "\n",
			$file
		);
		$has_errors = true;
	}

	if ( count( $expected_params ) === 0 ) {
		printf(
			'No parameters found in %1$s' . "\n",
			$txt
		);
		$has_errors = true;
	}

	if ( count( $missing ) > 0 ) {
		printf(
			'Properties are missing from %1$s: %2$s' . "\n",
			$file,
			implode( ', ', $missing )
		);
		$has_errors = true;
	}
}

if ( $has_errors ) {
	exit( 1 );
}
