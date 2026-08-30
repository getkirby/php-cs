<?php

namespace Kirby\PhpCs\Fixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\Phpdoc\NoBlankLinesAfterPhpdocFixer as Upstream;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

/**
 * `no_blank_lines_after_phpdoc`, except for the docblock a file opens with.
 */
final class NoBlankLinesAfterPhpdocFixer extends AbstractFixer
{
	private Upstream $fixer;

	public function __construct()
	{
		$this->fixer = new Upstream();
		parent::__construct();
	}

	protected function applyFix(SplFileInfo $file, Tokens $tokens): void
	{
		$index   = $this->leading($tokens);
		$content = null;

		if ($index !== null && $tokens[$index + 1]->isWhitespace() === true) {
			$content = $tokens[$index + 1]->getContent();
		}

		$this->fixer->fix($file, $tokens);

		// the upstream fixer only ever swaps the whitespace token that
		// follows a docblock, so the index still points at the same one
		if ($content !== null && $tokens[$index + 1]->isWhitespace() === true) {
			$tokens[$index + 1] = new Token([T_WHITESPACE, $content]);
		}
	}

	public function getDefinition(): FixerDefinitionInterface
	{
		return $this->fixer->getDefinition();
	}

	public function getName(): string
	{
		return 'Kirby/no_blank_lines_after_phpdoc';
	}

	public function getPriority(): int
	{
		return $this->fixer->getPriority();
	}

	public function isCandidate(Tokens $tokens): bool
	{
		return $this->fixer->isCandidate($tokens);
	}

	/**
	 * The index of the docblock a file opens with, if it has one.
	 * A docblock further down belongs to whatever it precedes, and a
	 * file that starts with markup has no opening docblock at all.
	 */
	private function leading(Tokens $tokens): int|null
	{
		if ($tokens[0]->isGivenKind(T_OPEN_TAG) === false) {
			return null;
		}

		$next = $tokens->getNextNonWhitespace(0);

		if ($next === null) {
			return null;
		}

		if ($tokens[$next]->isGivenKind(T_DOC_COMMENT) === false) {
			return null;
		}

		return $next;
	}
}
