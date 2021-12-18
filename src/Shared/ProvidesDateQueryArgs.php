<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for any query class that supports date queries.
 */
trait ProvidesDateQueryArgs {
	/**
	 * Date query clauses to limit results by. See WP_Date_Query.
	 *
	 * @var mixed[]
	 */
	public array $date_query;
}
