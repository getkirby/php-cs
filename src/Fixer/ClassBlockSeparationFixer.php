<?php

namespace Kirby\PhpCs\Fixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\WhitespacesAwareFixerInterface;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\CT;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\Tokenizer\TokensAnalyzer;
use SplFileInfo;

/**
 * Keeps a blank line between the blocks that `ordered_class_elements`
 * creates: trait imports, cases, constants and the property groups.
 *
 * `class_attributes_separation` only knows the element types `const` and
 * `property`, so with `only_if_meta` it neither separates a constant from
 * the first property nor a static property block from an instance one
 * whenever the following member has no docblock, which hides the grouping.
 */
final class ClassBlockSeparationFixer extends AbstractFixer implements WhitespacesAwareFixerInterface
{
	protected function applyFix(SplFileInfo $file, Tokens $tokens): void
	{
		$previous = [];

		foreach ((new TokensAnalyzer($tokens))->getClassyElements() as $index => $element) {
			$start = $this->start($tokens, $index);

			if ($start === null) {
				continue;
			}

			$class = $element['classIndex'];
			$block = $this->block($tokens, $start, $index, $element['type']);
			$last  = $previous[$class] ?? null;

			$previous[$class] = $block;

			if ($last !== null && $last !== $block) {
				$this->separate($tokens, $start);
			}
		}
	}

	/**
	 * Returns the block a class member belongs to
	 */
	private function block(
		Tokens $tokens,
		int $start,
		int $index,
		string $type
	): string {
		if ($type !== 'property') {
			return $type;
		}

		$static     = false;
		$visibility = 'public';

		// the modifiers sit between the declaration start and the variable
		for ($i = $start; $i < $index; $i++) {
			if ($tokens[$i]->isGivenKind(T_STATIC) === true) {
				$static = true;
			} elseif ($tokens[$i]->isGivenKind([T_PROTECTED, T_PRIVATE]) === true) {
				$visibility = 'nonpublic';
			}
		}

		return $visibility . ($static === true ? '_static' : '');
	}

	public function getDefinition(): FixerDefinitionInterface
	{
		return new FixerDefinition(
			'Class member blocks of different kinds must be separated by a blank line.',
			[
				new CodeSample(
					"<?php\nclass Foo\n{\n\tpublic const BAR = 1;\n\tprotected \$baz;\n}\n"
				)
			]
		);
	}

	public function getName(): string
	{
		return 'Kirby/class_block_separation';
	}

	/**
	 * Runs after `ordered_class_elements` (65), which forms the blocks,
	 * and `class_attributes_separation` (55), which sets the spacing
	 */
	public function getPriority(): int
	{
		return 50;
	}

	public function isCandidate(Tokens $tokens): bool
	{
		return $tokens->isAnyTokenKindsFound(Token::getClassyTokenKinds());
	}

	/**
	 * Makes sure a blank line precedes the given token
	 */
	private function separate(Tokens $tokens, int $start): void
	{
		$before = $start - 1;

		if ($tokens[$before]->isWhitespace() === false) {
			return;
		}

		$content = $tokens[$before]->getContent();

		if (substr_count($content, "\n") > 1) {
			return;
		}

		$tokens[$before] = new Token([
			T_WHITESPACE,
			$this->whitespacesConfig->getLineEnding() . $content
		]);
	}

	/**
	 * Returns the first token of a member declaration, including its
	 * docblock and attributes, or null if it is a promoted constructor
	 * parameter rather than a member of the class body
	 */
	private function start(Tokens $tokens, int $index): int|null
	{
		for ($i = $index - 1; $i > 0; $i--) {
			if ($tokens[$i]->isGivenKind(CT::T_ATTRIBUTE_CLOSE) === true) {
				$i = $tokens->findBlockStart(Tokens::BLOCK_TYPE_ATTRIBUTE, $i);
				continue;
			}

			if ($tokens[$i]->equalsAny(['(', ',']) === true) {
				return null;
			}

			if ($tokens[$i]->equalsAny([';', '{', '}']) === true) {
				return $tokens->getNextNonWhitespace($i);
			}
		}

		return null;
	}
}
