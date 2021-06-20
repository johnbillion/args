<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Argument values for any query class that supports meta queries.
 */
interface Query_By_Meta_Values {
	const META_COMPARE_KEY_EQUALS = '=';
	const META_COMPARE_KEY_NOT_EQUALS = '!=';
	const META_COMPARE_KEY_LIKE = 'LIKE';
	const META_COMPARE_KEY_NOT_LIKE = 'NOT LIKE';
	const META_COMPARE_KEY_IN = 'IN';
	const META_COMPARE_KEY_NOT_IN = 'NOT IN';
	const META_COMPARE_KEY_REGEXP = 'REGEXP';
	const META_COMPARE_KEY_NOT_REGEXP = 'NOT REGEXP';
	const META_COMPARE_KEY_RLIKE = 'RLIKE';
	const META_COMPARE_KEY_EXISTS = 'EXISTS';
	const META_COMPARE_KEY_NOT_EXISTS = 'NOT EXISTS';

	const META_COMPARE_VALUE_EQUALS = '=';
	const META_COMPARE_VALUE_NOT_EQUALS = '!=';
	const META_COMPARE_VALUE_GREATER_THAN = '>';
	const META_COMPARE_VALUE_GREATER_THAN_OR_EQUALS = '>=';
	const META_COMPARE_VALUE_LESS_THAN = '<';
	const META_COMPARE_VALUE_LESS_THAN_OR_EQUALS = '<=';
	const META_COMPARE_VALUE_LIKE = 'LIKE';
	const META_COMPARE_VALUE_NOT_LIKE = 'NOT LIKE';
	const META_COMPARE_VALUE_IN = 'IN';
	const META_COMPARE_VALUE_NOT_IN = 'NOT IN';
	const META_COMPARE_VALUE_BETWEEN = 'BETWEEN';
	const META_COMPARE_VALUE_NOT_BETWEEN = 'NOT BETWEEN';
	const META_COMPARE_VALUE_REGEXP = 'REGEXP';
	const META_COMPARE_VALUE_NOT_REGEXP = 'NOT REGEXP';
	const META_COMPARE_VALUE_RLIKE = 'RLIKE';
	const META_COMPARE_VALUE_EXISTS = 'EXISTS';
	const META_COMPARE_VALUE_NOT_EXISTS = 'NOT EXISTS';

	const META_TYPE_KEY_NONE = '';
	const META_TYPE_KEY_BINARY = 'BINARY';
}
