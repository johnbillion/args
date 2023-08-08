<?php

declare(strict_types=1);

namespace Args;

use WP_Http_Cookie;

/**
 * Arguments for the `WP_Http::request()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_http/request/
 */
class WP_Http extends Shared\Base {
	public const METHOD_GET = 'GET';
	public const METHOD_POST = 'POST';
	public const METHOD_HEAD = 'HEAD';
	public const METHOD_PUT = 'PUT';
	public const METHOD_DELETE = 'DELETE';
	public const METHOD_TRACE = 'TRACE';
	public const METHOD_OPTIONS = 'OPTIONS';
	public const METHOD_PATCH = 'PATCH';

	/** @var array<string, string> */
	protected array $map = [
		'user_agent' => 'user-agent',
	];

	/**
	 * Request method.
	 *
	 * Some transports technically allow others, but should not be assumed.
	 *
	 * Default 'GET'.
	 *
	 * @phpstan-var self::METHOD_*
	 */
	public string $method;

	/**
	 * How long the connection should stay open in seconds.
	 *
	 * Default 5.
	 */
	public float $timeout;

	/**
	 * Number of allowed redirects. Not supported by all transports.
	 *
	 * Default 5.
	 */
	public int $redirection;

	/**
	 * Version of the HTTP protocol to use.
	 *
	 * Accepts '1.0' and '1.1'.
	 *
	 * Default '1.0'.
	 */
	public string $httpversion;

	/**
	 * User-agent value sent.
	 *
	 * Default `'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' )`.
	 */
	public string $user_agent;

	/**
	 * Whether to pass URLs through `wp_http_validate_url()`.
	 *
	 * Default false.
	 */
	public bool $reject_unsafe_urls;

	/**
	 * Whether the calling code requires the result of the request.
	 *
	 * If set to false, the request will be sent to the remote server, and processing returned to the calling code immediately, the caller will know if the request succeeded or failed, but will not receive any response from the remote server.
	 *
	 * Default true.
	 */
	public bool $blocking;

	/**
	 * Array of headers to send with the request.
	 *
	 * Default empty array.
	 *
	 * @var array<string,string>
	 */
	public array $headers;

	/**
	 * List of cookies to send with the request.
	 *
	 * Default empty array.
	 *
	 * @var string[]|WP_Http_Cookie[]
	 */
	public array $cookies;

	/**
	 * Body to send with the request.
	 *
	 * Default null.
	 *
	 * @var string|mixed[]
	 */
	public $body;

	/**
	 * Whether to compress the $body when sending the request.
	 *
	 * Default false.
	 */
	public bool $compress;

	/**
	 * Whether to decompress a compressed response.
	 *
	 * If set to false and compressed content is returned in the response anyway, it will need to be separately decompressed.
	 *
	 * Default true.
	 */
	public bool $decompress;

	/**
	 * Whether to verify SSL for the request.
	 *
	 * Default true.
	 */
	public bool $sslverify;

	/**
	 * Absolute path to an SSL certificate `.crt` file.
	 *
	 * Default `ABSPATH . WPINC . '/certificates/ca-bundle.crt'`.
	 */
	public string $sslcertificates;

	/**
	 * Whether to stream to a file.
	 *
	 * If set to true and no filename was given, it will be dropped it in the WP temp dir and its name will be set using the basename of the URL.
	 *
	 * Default false.
	 */
	public bool $stream;

	/**
	 * Filename of the file to write to when streaming. `$stream` must be set to true.
	 *
	 * Default null.
	 */
	public string $filename;

	/**
	 * Size in bytes to limit the response to.
	 *
	 * Default null.
	 */
	public int $limit_response_size;
}
