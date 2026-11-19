<?php

declare(strict_types=1);

namespace Args\MetaQuery;

/**
 * Argument values for any query class that supports meta queries.
 */
interface Values {
	final public const META_COMPARE_KEY_EQUALS = '=';
	final public const META_COMPARE_KEY_NOT_EQUALS = '!=';
	final public const META_COMPARE_KEY_LIKE = 'LIKE';
	final public const META_COMPARE_KEY_NOT_LIKE = 'NOT LIKE';
	final public const META_COMPARE_KEY_IN = 'IN';
	final public const META_COMPARE_KEY_NOT_IN = 'NOT IN';
	final public const META_COMPARE_KEY_REGEXP = 'REGEXP';
	final public const META_COMPARE_KEY_NOT_REGEXP = 'NOT REGEXP';
	final public const META_COMPARE_KEY_RLIKE = 'RLIKE';
	final public const META_COMPARE_KEY_EXISTS = 'EXISTS';
	final public const META_COMPARE_KEY_NOT_EXISTS = 'NOT EXISTS';

	final public const META_COMPARE_VALUE_EQUALS = '=';
	final public const META_COMPARE_VALUE_NOT_EQUALS = '!=';
	final public const META_COMPARE_VALUE_GREATER_THAN = '>';
	final public const META_COMPARE_VALUE_GREATER_THAN_OR_EQUALS = '>=';
	final public const META_COMPARE_VALUE_LESS_THAN = '<';
	final public const META_COMPARE_VALUE_LESS_THAN_OR_EQUALS = '<=';
	final public const META_COMPARE_VALUE_LIKE = 'LIKE';
	final public const META_COMPARE_VALUE_NOT_LIKE = 'NOT LIKE';
	final public const META_COMPARE_VALUE_IN = 'IN';
	final public const META_COMPARE_VALUE_NOT_IN = 'NOT IN';
	final public const META_COMPARE_VALUE_BETWEEN = 'BETWEEN';
	final public const META_COMPARE_VALUE_NOT_BETWEEN = 'NOT BETWEEN';
	final public const META_COMPARE_VALUE_REGEXP = 'REGEXP';
	final public const META_COMPARE_VALUE_NOT_REGEXP = 'NOT REGEXP';
	final public const META_COMPARE_VALUE_RLIKE = 'RLIKE';
	final public const META_COMPARE_VALUE_EXISTS = 'EXISTS';
	final public const META_COMPARE_VALUE_NOT_EXISTS = 'NOT EXISTS';

	final public const META_TYPE_KEY_NONE = '';
	final public const META_TYPE_KEY_BINARY = 'BINARY';

	final public const META_TYPE_VALUE_NUMERIC = 'NUMERIC';
	final public const META_TYPE_VALUE_BINARY = 'BINARY';
	final public const META_TYPE_VALUE_CHAR = 'CHAR';
	final public const META_TYPE_VALUE_DATE = 'DATE';
	final public const META_TYPE_VALUE_DATETIME = 'DATETIME';
	final public const META_TYPE_VALUE_DECIMAL = 'DECIMAL';
	final public const META_TYPE_VALUE_SIGNED = 'SIGNED';
	final public const META_TYPE_VALUE_TIME = 'TIME';
	final public const META_TYPE_VALUE_UNSIGNED = 'UNSIGNED';

	final public const META_QUERY_RELATION_AND = 'AND';
	final public const META_QUERY_RELATION_OR = 'OR';
}
