<?php

namespace Kirby\PhpCs\Fixer;

use PhpCsFixer\Fixer\Basic\NoMultipleStatementsPerLineFixer as Upstream;
use PhpCsFixer\Fixer\FixerInterface;

/**
 * `no_multiple_statements_per_line`,
 * but only for files that are nothing but PHP.
 */
final class NoMultipleStatementsPerLineFixer extends MonolithicOnlyFixer
{
	protected function fixer(): FixerInterface
	{
		return new Upstream();
	}

	public function getName(): string
	{
		return 'Kirby/no_multiple_statements_per_line';
	}
}
