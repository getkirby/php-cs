<?php

namespace Kirby\PhpCs\Fixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Fixer\WhitespacesAwareFixerInterface;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\WhitespacesFixerConfig;
use SplFileInfo;

/**
 * Hands a file to an upstream fixer, but only if it is nothing but PHP.
 * Templates, snippets and layouts interleave PHP with HTML.
 */
abstract class MonolithicOnlyFixer extends AbstractFixer implements WhitespacesAwareFixerInterface
{
	protected FixerInterface $fixer;

	public function __construct()
	{
		$this->fixer = $this->fixer();
		parent::__construct();
	}

	protected function applyFix(SplFileInfo $file, Tokens $tokens): void
	{
		$this->fixer->fix($file, $tokens);
	}

	/**
	 * The upstream fixer to hand the file to
	 */
	abstract protected function fixer(): FixerInterface;

	public function getDefinition(): FixerDefinitionInterface
	{
		return $this->fixer->getDefinition();
	}

	public function getPriority(): int
	{
		return $this->fixer->getPriority();
	}

	public function isCandidate(Tokens $tokens): bool
	{
		return $tokens->isMonolithicPhp() === true &&
			$this->fixer->isCandidate($tokens) === true;
	}

	public function isRisky(): bool
	{
		return $this->fixer->isRisky();
	}

	public function setWhitespacesConfig(WhitespacesFixerConfig $config): void
	{
		parent::setWhitespacesConfig($config);

		if ($this->fixer instanceof WhitespacesAwareFixerInterface) {
			$this->fixer->setWhitespacesConfig($config);
		}
	}
}
