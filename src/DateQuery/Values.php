<?php

declare(strict_types=1);

namespace Args\DateQuery;

/**
 * Argument values for any query class that supports date queries.
 */
interface Values {
	final public const DATE_QUERY_RELATION_AND = 'AND';
	final public const DATE_QUERY_RELATION_OR = 'OR';

	final public const DATE_QUERY_COMPARE_EQUALS = '=';
	final public const DATE_QUERY_COMPARE_NOT_EQUALS = '!=';
	final public const DATE_QUERY_COMPARE_GREATER_THAN = '>';
	final public const DATE_QUERY_COMPARE_GREATER_THAN_OR_EQUALS = '>=';
	final public const DATE_QUERY_COMPARE_LESS_THAN = '<';
	final public const DATE_QUERY_COMPARE_LESS_THAN_OR_EQUALS = '<=';
	final public const DATE_QUERY_COMPARE_IN = 'IN';
	final public const DATE_QUERY_COMPARE_NOT_IN = 'NOT IN';
	final public const DATE_QUERY_COMPARE_BETWEEN = 'BETWEEN';
	final public const DATE_QUERY_COMPARE_NOT_BETWEEN = 'NOT BETWEEN';
}
