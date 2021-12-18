<?php

declare(strict_types=1);

namespace Args\Tests;

use Args\Shared\MetaQuery;
use Args\Shared\MetaQueryClause;
use Args\Shared\MetaQueryValues;
use PHPUnit\Framework\TestCase;

/**
 * @phpstan-type WithMeta class-string<\Args\Shared\WithMetaQueryArgs&\Args\Shared\Base>
 */
final class MetaQueryTest extends TestCase {
	use \FalseyAssertEqualsDetector\Test;

	/**
	 * @return array<string, array<int, WithMeta>>
	 */
	public function dataWithMetaQueryArgs() : array {
		return [
			'WP_Comment_Query' => [
				\Args\WP_Comment_Query::class,
			],
			'WP_Query' => [
				\Args\WP_Query::class,
			],
			'WP_Term_Query' => [
				\Args\WP_Term_Query::class,
			],
			'WP_User_Query' => [
				\Args\WP_User_Query::class,
			],
		];
	}

	/**
	 * @dataProvider dataWithMetaQueryArgs
	 * @param WithMeta $class
	 */
	public function testMetaQueryIsCorrectlyConvertedToArray( string $class ): void {
		$args = new $class;

		$clause1 = new MetaQueryClause;
		$clause1->key = 'my_meta_key';
		$clause1->value = 'my_meta_value';

		$clause2 = new MetaQueryClause;
		$clause2->value = '100';
		$clause2->compare = MetaQueryValues::META_COMPARE_VALUE_GREATER_THAN;

		$args->meta_query->relation = MetaQueryValues::META_QUERY_RELATION_OR;
		$args->meta_query->addClause( $clause1 );
		$args->meta_query->addClause( $clause2, 'clause2' );

		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'meta_query' => [
				'relation' => 'OR',
				[
					'key' => 'my_meta_key',
					'value' => 'my_meta_value',
				],
				'clause2' => [
					'compare' => '>',
					'value' => '100',
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithMetaQueryArgs
	 * @param WithMeta $class
	 */
	public function testMetaQueryIsCorrectlyConvertedFromArray( string $class ): void {
		$args = new $class;

		$meta_query = [
			'relation' => 'OR',
			[
				'key' => 'my_meta_key',
				'value' => 'my_meta_value',
			],
			[
				'compare' => '>',
				'value' => '100',
			],
		];
		$args->meta_query = MetaQuery::fromArray( $meta_query );
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'meta_query' => $meta_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithMetaQueryArgs
	 * @param WithMeta $class
	 */
	public function testMetaQueryWithNoClausesIsNotIncludedInArray( string $class ): void {
		$args = new $class;

		$args->meta_query->relation = MetaQueryValues::META_QUERY_RELATION_OR;
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
