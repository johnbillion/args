<?php

declare(strict_types=1);

namespace Args\TaxQuery;

/**
 * Argument values for any query class that supports taxonomy queries.
 */
interface Values {
	final public const TAX_QUERY_RELATION_AND = 'AND';
	final public const TAX_QUERY_RELATION_OR = 'OR';

	final public const TAX_QUERY_OPERATOR_AND = 'AND';
	final public const TAX_QUERY_OPERATOR_IN = 'IN';
	final public const TAX_QUERY_OPERATOR_NOT_IN = 'NOT IN';
	final public const TAX_QUERY_OPERATOR_EXISTS = 'EXISTS';
	final public const TAX_QUERY_OPERATOR_NOT_EXISTS = 'NOT EXISTS';
}
