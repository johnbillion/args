<?php

class WP_Post {}

class WP_Taxonomy {}

class WP_REST_Controller {}

class WP_REST_Request {}

class WP_Http_Cookie {}

function __return_false() : bool {
	return false;
}

/**
 * @return mixed[]
 */
function _n_noop( string $singular, string $plural, string $domain = null ) : array {
	return array(
		0          => $singular,
		1          => $plural,
		'singular' => $singular,
		'plural'   => $plural,
		'context'  => null,
		'domain'   => $domain,
	);
}
