<?php

declare(strict_types=1);

namespace Args\Tests;

use Args\DateQuery\Clause;
use Args\DateQuery\Query;
use Args\DateQuery\Values;
use PHPUnit\Framework\TestCase;

/**
 * @phpstan-type WithDate class-string<\Args\Shared\WithDateQueryArgs&\Args\Shared\Base>
 */
final class DateQueryTest extends TestCase {
	use \FalseyAssertEqualsDetector\Test;

	/**
	 * @return array<string, array<int, WithDate>>
	 */
	public function dataWithDateQueryArgs() : array {
		return [
			'WP_Comment_Query' => [
				\Args\WP_Comment_Query::class,
			],
			'WP_Query' => [
				\Args\WP_Query::class,
			],
		];
	}

	/**
	 * @dataProvider dataWithDateQueryArgs
	 * @param WithDate $class
	 */
	public function testDateQueryIsCorrectlyConvertedToArray( string $class ): void {
		$args = new $class;

		$clause1 = new Clause;
		$clause1->year = 1984;
		$clause1->column = 'post_modified';

		$clause2 = new Clause;
		$clause2->year = 2000;
		$clause2->column = 'post_modified';

		$args->date_query->compare = 'BETWEEN';
		$args->date_query->relation = Values::DATE_QUERY_RELATION_OR;
		$args->date_query->addClause( $clause1 );
		$args->date_query->addClause( $clause2 );

		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'date_query' => [
				'compare' => 'BETWEEN',
				'relation' => 'OR',
				[
					'column' => 'post_modified',
					'year' => 1984,
				],
				[
					'column' => 'post_modified',
					'year' => 2000,
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithDateQueryArgs
	 * @param WithDate $class
	 */
	public function testDateQueryIsCorrectlyConvertedFromArray( string $class ): void {
		$args = new $class;

		$date_query = [
			'relation' => 'OR',
			[
				'column' => 'post_modified',
				'year' => 1984,
			],
			[
				'column' => 'post_modified',
				'year' => 2000,
			],
		];
		$args->date_query = Query::fromArray( $date_query );
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'date_query' => $date_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithDateQueryArgs
	 * @param WithDate $class
	 */
	public function testDateQueryWithNoClausesIsNotIncludedInArray( string $class ): void {
		$args = new $class;

		$args->date_query->relation = Values::DATE_QUERY_RELATION_OR;
		$args->date_query->compare = 'NOT IN';
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
