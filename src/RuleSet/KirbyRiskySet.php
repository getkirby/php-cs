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
			'dir_constant' => true,
			'logical_operators' => true,
			'modernize_types_casting' => true,
		];
	}

	public function isRisky(): bool
	{
		return true;
	}
}
