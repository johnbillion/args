<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Argument values for any query class that supports taxonomy queries.
 */
interface TaxQueryValues {
	const TAX_QUERY_RELATION_AND = 'AND';
	const TAX_QUERY_RELATION_OR = 'OR';

	const TAX_QUERY_OPERATOR_AND = 'AND';
	const TAX_QUERY_OPERATOR_IN = 'IN';
	const TAX_QUERY_OPERATOR_NOT_IN = 'NOT IN';
	const TAX_QUERY_OPERATOR_EXISTS = 'EXISTS';
	const TAX_QUERY_OPERATOR_NOT_EXISTS = 'NOT EXISTS';
}
