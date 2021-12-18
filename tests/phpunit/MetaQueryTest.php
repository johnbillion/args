<?php

declare(strict_types=1);

namespace Args\Tests;

use Args\Shared\MetaQuery;
use Args\Shared\MetaQueryClause;
use Args\Shared\MetaQueryValues;
use PHPUnit\Framework\TestCase;

final class MetaQueryTest extends TestCase {

	use \FalseyAssertEqualsDetector\Test;

	public function testMetaQueryIsCorrectlyConvertedToArray(): void {
		$args = new \Args\WP_Query;

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
					'value' => '100',
					'compare' => '>',
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	public function testMetaQueryIsCorrectlyConvertedFromArray(): void {
		$args = new \Args\WP_Query;

		$meta_query = [
			'relation' => 'OR',
			[
				'key' => 'my_meta_key',
				'value' => 'my_meta_value',
			],
			[
				'value' => '100',
				'compare' => '>',
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
