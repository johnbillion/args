<?php

declare(strict_types=1);

namespace Args\Tests;

use Args\TaxQuery\Clause;
use Args\TaxQuery\Query;
use Args\TaxQuery\Values;
use PHPUnit\Framework\TestCase;

/**
 * @phpstan-type WithTax class-string<\Args\TaxQuery\WithArgs&\Args\Shared\Base>
 */
final class TaxQueryTest extends TestCase {
	use \FalseyAssertEqualsDetector\Test;

	/**
	 * @return array<string, array<int, WithTax>>
	 */
	public function dataWithTaxQueryArgs() : array {
		return [
			'WP_Query' => [
				\Args\WP_Query::class,
			],
		];
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testTaxQueryIsCorrectlyConvertedToArray( string $class ): void {
		$args = new $class;

		$clause1 = new Clause;
		$clause1->taxonomy = 'category';
		$clause1->terms = 'foo';

		$clause2 = new Clause;
		$clause2->terms = 456;
		$clause2->operator = 'EXISTS';

		$args->tax_query->relation = Values::TAX_QUERY_RELATION_OR;
		$args->tax_query->addClause( $clause1 );
		$args->tax_query->addClause( $clause2 );

		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'tax_query' => [
				'relation' => 'OR',
				[
					'taxonomy' => 'category',
					'terms' => 'foo',
				],
				[
					'operator' => 'EXISTS',
					'terms' => 456,
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testTaxQueryIsCorrectlyConvertedFromArray( string $class ): void {
		$args = new $class;

		$tax_query = [
			'relation' => 'OR',
			[
				'taxonomy' => 'category',
				'terms' => 'foo',
			],
			[
				'operator' => 'EXISTS',
				'terms' => 456,
			],
		];
		$args->tax_query = Query::fromArray( $tax_query );
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
			'tax_query' => $tax_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testTaxQueryWithNoClausesIsNotIncludedInArray( string $class ): void {
		$args = new $class;

		$args->tax_query->relation = Values::TAX_QUERY_RELATION_OR;
		$args->attachment_id = 123;

		$expected = [
			'attachment_id' => 123,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
