<?php

declare(strict_types=1);

namespace Args\MetaQuery;

/**
 * Methods for any query class that supports meta queries.
 */
interface WithArgs {
	public function setMetaQuery( Query $meta_query ) : void;
}
