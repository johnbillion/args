<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_Abilities_Registry::register()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_abilities_registry/register/
 */
class WP_Abilities_Registry extends Shared\Base {
	/**
	 * The human-readable label for the ability.
	 */
	public string $label;

	/**
	 * A detailed description of what the ability does.
	 */
	public string $description;

	/**
	 * The ability category slug this ability belongs to.
	 */
	public string $category;

	/**
	 * A callback function to execute when the ability is invoked.
	 *
	 * Receives optional mixed input and returns mixed result or WP_Error.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed=): (mixed|\WP_Error)
	 */
	public $execute_callback;

	/**
	 * A callback function to check permissions before execution.
	 *
	 * Receives optional mixed input and returns bool or WP_Error.
	 *
	 * Required unless `$required_capabilities` lists at least one capability.
	 *
	 * @var callable
	 * @phpstan-var callable(mixed=): (bool|\WP_Error)
	 */
	public $permission_callback;

	/**
	 * Minimum capabilities required for every execution of the ability, regardless of input.
	 *
	 * They are checked before `$permission_callback`, which handles input-dependent requirements.
	 *
	 * @var array<int, string>
	 * @phpstan-var list<string>
	 */
	public array $required_capabilities;

	/**
	 * JSON Schema definition for the ability's input.
	 *
	 * @var array<string, mixed>
	 */
	public array $input_schema;

	/**
	 * JSON Schema definition for the ability's output.
	 *
	 * @var array<string, mixed>
	 */
	public array $output_schema;

	/**
	 * Additional metadata for the ability.
	 *
	 * @var array<string, mixed>
	 * @phpstan-var array{
	 *     annotations?: array{
	 *         readonly?: bool|null,
	 *         destructive?: bool|null,
	 *         idempotent?: bool|null,
	 *     },
	 *     public?: bool,
	 *     show_in_rest?: bool,
	 * }
	 */
	public array $meta;

	/**
	 * Custom class to instantiate instead of WP_Ability.
	 *
	 * @phpstan-var class-string<\WP_Ability>
	 */
	public string $ability_class;
}
