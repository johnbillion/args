<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Methods for any query class that supports meta queries.
 */
interface WithMetaQueryArgs {
	public function setMetaQuery( MetaQuery $meta_query ) : void;
}
