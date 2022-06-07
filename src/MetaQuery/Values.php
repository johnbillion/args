<?php

declare(strict_types=1);

namespace Args\MetaQuery;

/**
 * Argument values for any query class that supports meta queries.
 */
interface Values {
	public const META_COMPARE_KEY_EQUALS = '=';
	public const META_COMPARE_KEY_NOT_EQUALS = '!=';
	public const META_COMPARE_KEY_LIKE = 'LIKE';
	public const META_COMPARE_KEY_NOT_LIKE = 'NOT LIKE';
	public const META_COMPARE_KEY_IN = 'IN';
	public const META_COMPARE_KEY_NOT_IN = 'NOT IN';
	public const META_COMPARE_KEY_REGEXP = 'REGEXP';
	public const META_COMPARE_KEY_NOT_REGEXP = 'NOT REGEXP';
	public const META_COMPARE_KEY_RLIKE = 'RLIKE';
	public const META_COMPARE_KEY_EXISTS = 'EXISTS';
	public const META_COMPARE_KEY_NOT_EXISTS = 'NOT EXISTS';

	public const META_COMPARE_VALUE_EQUALS = '=';
	public const META_COMPARE_VALUE_NOT_EQUALS = '!=';
	public const META_COMPARE_VALUE_GREATER_THAN = '>';
	public const META_COMPARE_VALUE_GREATER_THAN_OR_EQUALS = '>=';
	public const META_COMPARE_VALUE_LESS_THAN = '<';
	public const META_COMPARE_VALUE_LESS_THAN_OR_EQUALS = '<=';
	public const META_COMPARE_VALUE_LIKE = 'LIKE';
	public const META_COMPARE_VALUE_NOT_LIKE = 'NOT LIKE';
	public const META_COMPARE_VALUE_IN = 'IN';
	public const META_COMPARE_VALUE_NOT_IN = 'NOT IN';
	public const META_COMPARE_VALUE_BETWEEN = 'BETWEEN';
	public const META_COMPARE_VALUE_NOT_BETWEEN = 'NOT BETWEEN';
	public const META_COMPARE_VALUE_REGEXP = 'REGEXP';
	public const META_COMPARE_VALUE_NOT_REGEXP = 'NOT REGEXP';
	public const META_COMPARE_VALUE_RLIKE = 'RLIKE';
	public const META_COMPARE_VALUE_EXISTS = 'EXISTS';
	public const META_COMPARE_VALUE_NOT_EXISTS = 'NOT EXISTS';

	public const META_TYPE_KEY_NONE = '';
	public const META_TYPE_KEY_BINARY = 'BINARY';

	public const META_TYPE_VALUE_NUMERIC = 'NUMERIC';
	public const META_TYPE_VALUE_BINARY = 'BINARY';
	public const META_TYPE_VALUE_CHAR = 'CHAR';
	public const META_TYPE_VALUE_DATE = 'DATE';
	public const META_TYPE_VALUE_DATETIME = 'DATETIME';
	public const META_TYPE_VALUE_DECIMAL = 'DECIMAL';
	public const META_TYPE_VALUE_SIGNED = 'SIGNED';
	public const META_TYPE_VALUE_TIME = 'TIME';
	public const META_TYPE_VALUE_UNSIGNED = 'UNSIGNED';

	public const META_QUERY_RELATION_AND = 'AND';
	public const META_QUERY_RELATION_OR = 'OR';
}
