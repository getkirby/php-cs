<?php

namespace Kirby\CodingStandards\RuleSet;

use PhpCsFixer\RuleSet\AbstractRuleSetDefinition;

/**
 * The rules on top of `@Kirby/style` that can change behaviour and so need
 * `setRiskyAllowed(true)`
 */
final class KirbyRiskySet extends AbstractRuleSetDefinition
{
	public function getDescription(): string
	{
		return 'The Kirby code style, including rules that may change behaviour.';
	}

	public function getName(): string
	{
		return '@Kirby/style:risky';
	}

	public function getRules(): array
	{
		return [
			'@Kirby/style' => true,
			'combine_nested_dirname' => true,
			'date_time_create_from_format_call' => true,
			'dir_constant' => true,
			'fopen_flag_order' => true,
			'get_class_to_class_keyword' => true,
			'logical_operators' => true,
			'modern_serialization_methods' => true,
			'modernize_types_casting' => true,
			'no_alias_functions' => true,
			'no_unreachable_default_argument_value' => true,
			'no_useless_printf' => true,
			'no_useless_sprintf' => true,
			'php_unit_data_provider_static' => true,
			'php_unit_dedicate_assert_internal_type' => true,
			'php_unit_mock_short_will_return' => true,
			'pow_to_exponentiation' => true,
			'set_type_to_cast' => true,
		];
	}

	public function isRisky(): bool
	{
		return true;
	}
}
