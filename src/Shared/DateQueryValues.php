<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Argument values for any query class that supports date queries.
 */
interface DateQueryValues {
	const DATE_QUERY_RELATION_AND = 'AND';
	const DATE_QUERY_RELATION_OR = 'OR';
}
