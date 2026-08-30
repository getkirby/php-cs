<?php

namespace Kirby\PhpCs\RuleSet;

use PhpCsFixer\RuleSet\AbstractRuleSetDefinition;

/**
 * The shared Kirby PHP code style.
 */
final class KirbySet extends AbstractRuleSetDefinition
{
	public function getDescription(): string
	{
		return 'The Kirby PHP code style.';
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
			'attribute_block_no_spaces' => true,
			'attribute_empty_parentheses' => true,
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
			'class_reference_name_casing' => true,
			'combine_consecutive_issets' => true,
			'combine_consecutive_unsets' => true,
			'concat_space' => [
				'spacing' => 'one'
			],
			'declare_equal_normalize' => [
				'space' => 'single'
			],
			'declare_parentheses' => true,
			'empty_loop_body' => [
				'style' => 'braces'
			],
			'include' => true,
			'Kirby/class_block_separation' => true,
			'Kirby/fully_qualified_strict_types' => [
				'import_symbols' => true
			],
			'Kirby/phpdoc_no_redundant_types' => true,
			'lambda_not_used_import' => true,
			'linebreak_after_opening_tag' => true,
			'list_syntax' => [
				'syntax' => 'short'
			],
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
			'no_redundant_readonly_property' => true,
			'no_short_bool_cast' => true,
			'no_singleline_whitespace_before_semicolons' => true,
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
			'ordered_interfaces' => true,
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
			'phpdoc_inline_tag_normalizer' => true,
			'phpdoc_no_access' => true,
			'phpdoc_no_duplicate_types' => true,
			'phpdoc_no_package' => true,
			'phpdoc_no_useless_inheritdoc' => true,
			'phpdoc_order_by_value' => true,
			'phpdoc_param_order' => true,
			'phpdoc_return_self_reference' => true,
			'phpdoc_scalar' => true,
			'phpdoc_single_line_var_spacing' => true,
			'phpdoc_tag_casing' => true,
			'phpdoc_tag_type' => [
				'tags' => [
					'inheritDoc' => 'inline'
				]
			],
			'phpdoc_trim' => true,
			'phpdoc_types' => true,
			'phpdoc_var_annotation_correct_order' => true,
			'phpdoc_var_without_name' => true,
			'return_to_yield_from' => true,
			'simple_to_complex_string_variable' => true,
			'single_line_comment_style' => true,
			'single_quote' => true,
			'space_after_semicolon' => [
				'remove_in_empty_for_expressions' => true
			],
			'standardize_not_equals' => true,
			'statement_indentation' => [
				'stick_comment_to_next_continuous_control_statement' => true
			],
			'switch_continue_to_break' => true,
			'ternary_to_null_coalescing' => true,
			'trim_array_spaces' => true,
			'type_declaration_spaces' => true,
			'whitespace_after_comma_in_array' => true,
		];
	}
}
