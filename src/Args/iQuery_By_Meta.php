<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for any query class that allows querying by meta data.
 */
interface iQuery_By_Meta {
	const META_COMPARE_EQUALS = '=';
	const META_COMPARE_NOT_EQUALS = '!=';
	const META_COMPARE_GREATER_THAN = '>';
	const META_COMPARE_GREATER_THAN_OR_EQUALS = '>=';
	const META_COMPARE_LESS_THAN = '<';
	const META_COMPARE_LESS_THAN_OR_EQUALS = '<=';
	const META_COMPARE_LIKE = 'LIKE';
	const META_COMPARE_NOT_LIKE = 'NOT LIKE';
	const META_COMPARE_IN = 'IN';
	const META_COMPARE_NOT_IN = 'NOT IN';
	const META_COMPARE_BETWEEN = 'BETWEEN';
	const META_COMPARE_NOT_BETWEEN = 'NOT BETWEEN';
	const META_COMPARE_REGEXP = 'REGEXP';
	const META_COMPARE_NOT_REGEXP = 'NOT REGEXP';
	const META_COMPARE_RLIKE = 'RLIKE';
	const META_COMPARE_EXISTS = 'EXISTS';
	const META_COMPARE_NOT_EXISTS = 'NOT EXISTS';
}
