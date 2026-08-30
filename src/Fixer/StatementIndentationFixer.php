<?php

namespace Kirby\PhpCs\Fixer;

use PhpCsFixer\Fixer\ConfigurableFixerInterface;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer as Upstream;
use PhpCsFixer\FixerConfiguration\FixerConfigurationResolverInterface;

/**
 * `statement_indentation`, but only for files that are nothing but PHP.
 */
final class StatementIndentationFixer extends MonolithicOnlyFixer implements ConfigurableFixerInterface
{
	public function configure(array $configuration): void
	{
		$this->fixer->configure($configuration);
	}

	protected function fixer(): FixerInterface
	{
		return new Upstream();
	}

	public function getConfigurationDefinition(): FixerConfigurationResolverInterface
	{
		return $this->fixer->getConfigurationDefinition();
	}

	public function getName(): string
	{
		return 'Kirby/statement_indentation';
	}
}
