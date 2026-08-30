<?php

namespace Kirby\CodingStandards\RuleSet;

use PhpCsFixer\RuleSet\AbstractRuleSetDefinition;

/**
 * The shared Kirby code style.
 *
 * Some of these deliberately override `@PSR12`, which is applied first:
 * `declare_equal_normalize`, `new_with_parentheses`, `ordered_class_elements`,
 * `ordered_imports` and `statement_indentation`. Do not remove them as
 * duplicates.
 */
final class KirbySet extends AbstractRuleSetDefinition
{
	public function getDescription(): string
	{
		return 'The Kirby code style.';
	}

	public function getName(): string
	{
		return '@Kirby/style';
	}

	public function getRules(): array
	{
		return [
			'@PSR12' => true,
			'align_multiline_comment' => [
				'comment_type' => 'all_multiline'
			],
			'array_indentation' => true,
			'array_syntax' => [
				'syntax' => 'short'
			],
			'assign_null_coalescing_to_coalesce_equal' => true,
			'cast_spaces' => [
				'space' => 'none'
			],
			'class_attributes_separation' => [
				'elements' => [
					'const' => 'only_if_meta',
					'method' => 'one',
					'property' => 'only_if_meta',
					'trait_import' => 'none',
					'case' => 'none'
				]
			],
			'combine_consecutive_issets' => true,
			'combine_consecutive_unsets' => true,
			'concat_space' => [
				'spacing' => 'one'
			],
			'declare_equal_normalize' => [
				'space' => 'single'
			],
			'include' => true,
			'Kirby/class_block_separation' => true,
			'Kirby/fully_qualified_strict_types' => [
				'import_symbols' => true
			],
			'Kirby/phpdoc_no_redundant_types' => true,
			'magic_constant_casing' => true,
			'magic_method_casing' => true,
			'method_chaining_indentation' => true,
			'multiline_comment_opening_closing' => true,
			'native_function_casing' => true,
			'native_type_declaration_casing' => true,
			'new_with_parentheses' => true,
			'no_blank_lines_after_phpdoc' => true,
			'no_empty_comment' => true,
			'no_empty_phpdoc' => true,
			'no_empty_statement' => true,
			'no_leading_namespace_whitespace' => true,
			'no_mixed_echo_print' => [
				'use' => 'echo'
			],
			'no_short_bool_cast' => true,
			'no_superfluous_elseif' => true,
			'no_superfluous_phpdoc_tags' => [
				'allow_unused_params' => true
			],
			'no_unneeded_braces' => true,
			'no_unneeded_control_parentheses' => true,
			'no_unneeded_import_alias' => true,
			'no_unused_imports' => true,
			'no_useless_else' => true,
			'no_useless_nullsafe_operator' => true,
			'no_useless_return' => true,
			'no_whitespace_before_comma_in_array' => true,
			'nullable_type_declaration' => [
				'syntax' => 'union'
			],
			'nullable_type_declaration_for_default_null_value' => true,
			'object_operator_without_whitespace' => true,
			'operator_linebreak' => [
				'position' => 'end',
				'only_booleans' => true
			],
			'ordered_class_elements' => [
				'order' => [
					'use_trait',
					'case',
					'constant',
					'property_public_static',
					'property_public',
					'property_protected',
					'property_private',
					'property_protected_static',
					'property_private_static',
					'construct',
					'destruct',
					'magic',
					'phpunit',
					'method'
				],
				'sort_algorithm' => 'alpha'
			],
			'ordered_imports' => [
				'sort_algorithm' => 'alpha'
			],
			'ordered_types' => [
				'sort_algorithm' => 'none',
				'null_adjustment' => 'always_last'
			],
			'php_unit_data_provider_method_order' => [
				'placement' => 'before'
			],
			'phpdoc_align' => [
				'align' => 'left'
			],
			'phpdoc_indent' => true,
			'phpdoc_param_order' => true,
			'phpdoc_scalar' => true,
			'phpdoc_trim' => true,
			'single_line_comment_style' => true,
			'single_quote' => true,
			'statement_indentation' => [
				'stick_comment_to_next_continuous_control_statement' => true
			],
			'ternary_to_null_coalescing' => true,
			'trim_array_spaces' => true,
			'type_declaration_spaces' => true,
			'whitespace_after_comma_in_array' => true,
		];
	}
}
