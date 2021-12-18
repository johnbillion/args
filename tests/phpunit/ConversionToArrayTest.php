<?php

declare(strict_types=1);

namespace Args\Tests;

use Args\Shared\MetaQuery;
use Args\Shared\MetaQueryClause;
use Args\Shared\MetaQueryValues;
use PHPUnit\Framework\TestCase;

final class ConversionToArrayTest extends TestCase {

	use \FalseyAssertEqualsDetector\Test;

	public function testBasicParamsAreCorrectlyConvertedToArray(): void {
		$args = new \Args\WP_Query;

		self::assertObjectHasAttribute( 'attachment_id', $args );
		self::assertObjectHasAttribute( 'author', $args );

		$args->attachment_id = 123;
		$args->author = '1,2,3';

		$expected = [
			'attachment_id' => 123,
			'author' => '1,2,3',
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	public function testUnknownParamsAreIncludedInArray(): void {
		$args = new \Args\WP_Query;

		self::assertObjectHasAttribute( 'attachment_id', $args );
		self::assertObjectNotHasAttribute( 'hello', $args );

		$args->attachment_id = 123;
		$args->hello = 'world';

		$expected = [
			'attachment_id' => 123,
			'hello' => 'world',
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
	public function testCountingArrayElementsWorksAsExpected(): void {
		$args = new \Args\WP_Query;

		self::assertCount( 0, $args );

		$args->attachment_id = 123;
		$args->hello = 'world';

		self::assertCount( 2, $args );
	}

	public function testIteratingArrayElementsWorksAsExpected(): void {
		$args = new \Args\WP_Query;

		$args->attachment_id = 123;
		$args->hello = 'world';

		$expected = [
			123,
			'world',
		];
		$actual = [];

		foreach ( $args as $arg ) {
			$actual[] = $arg;
		}

		self::assertSame( $expected, $actual );
	}

	public function testIndexedMetaQueryIsCorrectlyConvertedToArray(): void {
		$args = new \Args\WP_Query;

		$clause1 = new MetaQueryClause;
		$clause1->key = 'my_meta_key';
		$clause1->value = 'my_meta_value';

		$clause2 = new MetaQueryClause;
		$clause2->value = '100';
		$clause2->compare = MetaQueryValues::META_COMPARE_VALUE_GREATER_THAN;

		$args->meta_query->relation = MetaQueryValues::META_QUERY_RELATION_OR;
		$args->meta_query->addClause( $clause1 );
		$args->meta_query->addClause( $clause2 );

		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'meta_query' => [
				'relation' => 'OR',
				[
					'key' => 'my_meta_key',
					'value' => 'my_meta_value',
				],
				[
					'value' => '100',
					'compare' => '>',
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	public function testCombinedMetaQueryArgumentsAreCorrectlyConvertedToArray(): void {
		self::markTestIncomplete();
	}

	public function testAssociativeMetaQueryIsCorrectlyConvertedToArray(): void {
		self::markTestIncomplete();
	}

	public function testMetaQueryWithOnlyItsRelationIsNotIncludedInArray(): void {
		$args = new \Args\WP_Query;

		$args->meta_query->relation = MetaQueryValues::META_QUERY_RELATION_OR;
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
