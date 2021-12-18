<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Argument values for any query class that supports date queries.
 */
interface DateQueryValues {
	const DATE_QUERY_RELATION_AND = 'AND';
	const DATE_QUERY_RELATION_OR = 'OR';

	const DATE_QUERY_COMPARE_EQUALS = '=';
	const DATE_QUERY_COMPARE_NOT_EQUALS = '!=';
	const DATE_QUERY_COMPARE_GREATER_THAN = '>';
	const DATE_QUERY_COMPARE_GREATER_THAN_OR_EQUALS = '>=';
	const DATE_QUERY_COMPARE_LESS_THAN = '<';
	const DATE_QUERY_COMPARE_LESS_THAN_OR_EQUALS = '<=';
	const DATE_QUERY_COMPARE_IN = 'IN';
	const DATE_QUERY_COMPARE_NOT_IN = 'NOT IN';
	const DATE_QUERY_COMPARE_BETWEEN = 'BETWEEN';
	const DATE_QUERY_COMPARE_NOT_BETWEEN = 'NOT BETWEEN';
}
