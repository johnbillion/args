<?php

declare(strict_types=1);

namespace Args\Tests;

use PHPUnit\Framework\TestCase;

final class BasicTest extends TestCase {

	use \FalseyAssertEqualsDetector\Test;

	public function testBasicParamsAreCorrectlyConvertedToArray(): void {
		$args = new \Args\WP_Query;

		$args->attachment_id = 123;
		$args->author = '1,2,3';

		$expected = [
			'attachment_id' => 123,
			'author' => '1,2,3',
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	public function testStringOrderIsUnchanged(): void {
		$args = new \Args\WP_Query;

		$args->order = 'ASC';

		self::assertSame( [ 'order' => 'ASC' ], $args->toArray() );
	}

	/**
	 * @requires PHP >= 8.6
	 */
	public function testSortDirectionIsConvertedToString(): void {
		$args = new \Args\WP_Query;

		$args->order = \SortDirection::Ascending;
		self::assertSame( [ 'order' => 'ASC' ], $args->toArray() );

		$args->order = \SortDirection::Descending;
		self::assertSame( [ 'order' => 'DESC' ], $args->toArray() );
	}

	/**
	 * @requires PHP >= 8.6
	 */
	public function testSortDirectionInOrderbyArrayIsConvertedToString(): void {
		$args = new \Args\WP_User_Query;

		$args->orderby = [
			'user_login' => \SortDirection::Ascending,
			'user_registered' => \SortDirection::Descending,
			'post_count' => 'ASC',
		];

		$expected = [
			'orderby' => [
				'user_login' => 'ASC',
				'user_registered' => 'DESC',
				'post_count' => 'ASC',
			],
		];

		self::assertSame( $expected, $args->toArray() );
	}

	/**
	 * @requires PHP >= 8.6
	 */
	public function testSortDirectionCanBeSetFromArray(): void {
		$args = \Args\WP_Term_Query::fromArray( [
			'order' => \SortDirection::Descending,
		] );

		self::assertSame( [ 'order' => 'DESC' ], $args->toArray() );
	}

	public function testUndeclaredParamsCanBeSet(): void {
		$args = \Args\WP_Query::fromArray( [
			'not_a_real_arg' => 123,
		] );
		$args->another_fake_arg = 'yes';

		$clause = \Args\MetaQuery\Clause::fromArray( [
			'not_a_real_arg' => 456,
		] );

		$expected = [
			'another_fake_arg' => 'yes',
			'not_a_real_arg' => 123,
		];

		self::assertSame( $expected, $args->toArray() );
		self::assertSame( [ 'not_a_real_arg' => 456 ], $clause->toArray() );
	}

	public function testUnknownParamsAreIncludedInArray(): void {
		$args = new \Args\WP_Query;

		$args->attachment_id = 123;
		$args->name = 'world';

		$expected = [
			'attachment_id' => 123,
			'name' => 'world',
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
