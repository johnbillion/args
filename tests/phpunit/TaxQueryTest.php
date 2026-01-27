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

		$expected = [
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

		$expected = [
			'tax_query' => $tax_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testNestedTaxQueryIsCorrectlyConvertedToArray( string $class ): void {
		$args = new $class;

		$clause1 = new Clause;
		$clause1->taxonomy = 'category';
		$clause1->terms = 'foo';

		$clause2 = new Clause;
		$clause2->taxonomy = 'post_tag';
		$clause2->terms = 'bar';
		$clause2->operator = 'NOT IN';

		$query = new Query;
		$query->relation = Values::TAX_QUERY_RELATION_AND;
		$query->addClause( $clause2 );

		$args->tax_query->addClause( $clause1 );
		$args->tax_query->addQuery( $query, 'nested' );

		$expected = [
			'tax_query' => [
				[
					'taxonomy' => 'category',
					'terms' => 'foo',
				],
				'nested' => [
					'relation' => 'AND',
					[
						'operator' => 'NOT IN',
						'taxonomy' => 'post_tag',
						'terms' => 'bar',
					],
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
	public function testAssociativeNestedTaxQueryIsCorrectlyConvertedFromArray( string $class ): void {
		$args = new $class;

		$tax_query = [
			'relation' => 'AND',
			[
				'taxonomy' => 'category',
				'terms' => 'foo',
			],
			'nested' => [
				[
					'operator' => 'NOT IN',
					'taxonomy' => 'post_tag',
					'terms' => 'bar',
				],
				[
					'field' => 'slug',
					'taxonomy' => 'custom_tax',
					'terms' => 'baz',
				],
			],
		];
		$args->tax_query = Query::fromArray( $tax_query );

		$expected = [
			'tax_query' => $tax_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testIndexedNestedTaxQueryIsCorrectlyConvertedFromArray( string $class ): void {
		$args = new $class;

		$tax_query = [
			'relation' => 'OR',
			[
				'taxonomy' => 'category',
				'terms' => 'news',
			],
			[
				'relation' => 'AND',
				[
					'taxonomy' => 'post_tag',
					'terms' => 'featured',
				],
				[
					'operator' => 'EXISTS',
					'taxonomy' => 'custom_tax',
					'terms' => 'special',
				],
			],
		];
		$args->tax_query = Query::fromArray( $tax_query );

		$expected = [
			'tax_query' => $tax_query,
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testEmptyNestedTaxQueryIsNotIncludedInArray( string $class ): void {
		$args = new $class;

		$clause1 = new Clause;
		$clause1->taxonomy = 'category';
		$clause1->terms = 'foo';

		$emptyQuery = new Query;

		$args->tax_query->addClause( $clause1 );
		$args->tax_query->addQuery( $emptyQuery );

		$expected = [
			'tax_query' => [
				[
					'taxonomy' => 'category',
					'terms' => 'foo',
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
	public function testTaxQueryWithNoClausesIsNotIncludedInArray( string $class ): void {
		$args = new $class;

		$args->tax_query->relation = Values::TAX_QUERY_RELATION_OR;

		$expected = [];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}

	/**
	 * @dataProvider dataWithTaxQueryArgs
	 * @param WithTax $class
	 */
	public function testTaxQueryChildrenBackwardCompatibility( string $class ): void {
		$args = new $class;

		$clause1 = new Clause;
		$clause1->taxonomy = 'category';
		$clause1->terms = 'foo';
		$clause1->include_children = true;

		$clause2 = new Clause;
		$clause2->terms = 456;
		$clause2->operator = 'EXISTS';
		$clause2->children = false;

		$args->tax_query->relation = Values::TAX_QUERY_RELATION_OR;
		$args->tax_query->addClause( $clause1 );
		$args->tax_query->addClause( $clause2 );

		$expected = [
			'tax_query' => [
				'relation' => 'OR',
				[
					'include_children' => true,
					'taxonomy' => 'category',
					'terms' => 'foo',
				],
				[
					'children' => false,
					'include_children' => false,
					'operator' => 'EXISTS',
					'terms' => 456,
				],
			],
		];
		$actual = $args->toArray();

		self::assertSame( $expected, $actual );
	}
}
