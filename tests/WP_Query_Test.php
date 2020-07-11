<?php

namespace Args\tests;

/**
 * @internal
 */
final class WP_Query_Test extends \PHPUnit\Framework\TestCase {

	public function testSimple() {
		$args = new \Args\WP_Query;

		$args->tag            = 'amazing';
		$args->posts_per_page = 100;

		static::assertSame(
			[
				'tag'            => 'amazing',
				'posts_per_page' => 100
			],
			$args->toArray()
		);
	}

	public function testWrongType() {
		$this->expectException(\TypeError::class);
		$this->expectExceptionMessageRegExp('#Invalid type: expected "posts_per_page" to be of type {int}, instead got value "Array"#');

		$args = new \Args\WP_Query;

		$args->tag            = 'amazing';
		$args->posts_per_page = [100];
	}

	public function testMissingKey() {
		$this->expectException(\TypeError::class);
		$this->expectExceptionMessage('The key "numberposts" does not exists as "@property" phpdoc. (Args\WP_Query).');

		$args = new \Args\WP_Query;

		$args->tag         = 'amazing';
		$args->numberposts = 3.5;
	}

	public function testTypoKey() {
		$this->expectException(\TypeError::class);
		$this->expectExceptionMessage('The key "tog" does not exists as "@property" phpdoc. (Args\WP_Query).');

		$args = new \Args\WP_Query;

		$args->tog         = 'amazing';
		$args->numberposts = 2;
	}

	public function testMeta() {

		$argsMeta = \Args\WP_Query::meta();

		$args = new \Args\WP_Query(
			[
				$argsMeta->order => 'ASC',
				$argsMeta->offset => 1,
				$argsMeta->author => '1,2,3,4'
			]
		);

		static::assertInstanceOf(\Args\WP_Query::class, $args);
		static::assertSame('1,2,3,4', $args->author);
		static::assertSame('1,2,3,4', $args['author']);
		static::assertSame('1,2,3,4', $args[$argsMeta->author]);
	}
}
