<?php

namespace Args\tests;

/**
 * @internal
 */
final class get_post_Test extends \PHPUnit\Framework\TestCase {

	public function testSimple() {
		$args = new \Args\get_posts();

		$args->tag            = 'amazing';
		$args->posts_per_page = 100;
		$args->numberposts    = 2;

		static::assertSame(
			[
				'tag'            => 'amazing',
				'posts_per_page' => 100,
				'numberposts'    => 2,
			],
			$args->toArray()
		);
	}

	public function testWrongType() {
		$this->expectException(\TypeError::class);
		$this->expectExceptionMessage('Invalid type: expected "numberposts" to be of type {int}, instead got value "3.5" (3.5) with type {double}.');

		$args = new \Args\get_posts();

		$args->tag         = 'amazing';
		$args->numberposts = 3.5;
	}


}
