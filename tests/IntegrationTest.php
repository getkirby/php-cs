<?php

namespace Kirby\PhpCs\Tests;

use Kirby\PhpCs\Config;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerFactory;
use PhpCsFixer\RuleSet\RuleSet;
use PhpCsFixer\RuleSet\RuleSets;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\WhitespacesFixerConfig;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use SplFileInfo;

/**
 * Runs the whole `@Kirby/style:risky` set over a fixture the way the CLI
 * does. The unit fixtures pin down what a single custom fixer does; these
 * pin down what the rule set as a whole makes of a file, which is where
 * the custom rules and the upstream ones have to agree.
 */
class IntegrationTest extends TestCase
{
	/**
	 * @var list<FixerInterface>|null
	 */
	private static array|null $fixers = null;

	/**
	 * Applies every rule of the set in priority order, like `Runner` does
	 */
	protected static function fix(string $path): string
	{
		$file   = new SplFileInfo($path);
		$tokens = Tokens::fromCode(file_get_contents($path));

		foreach (static::fixers() as $fixer) {
			if ($fixer->supports($file) === false) {
				continue;
			}

			if ($fixer->isCandidate($tokens) === false) {
				continue;
			}

			$fixer->fix($file, $tokens);
			$tokens->clearEmptyTokens();
		}

		return $tokens->generateCode();
	}

	/**
	 * The configured fixers of `@Kirby/style:risky`, in priority order
	 *
	 * @return list<FixerInterface>
	 */
	protected static function fixers(): array
	{
		if (static::$fixers !== null) {
			return static::$fixers;
		}

		$config = Config::create();

		foreach ($config->getCustomRuleSets() as $set) {
			RuleSets::registerCustomRuleSet($set);
		}

		return static::$fixers = (new FixerFactory())
			->registerBuiltInFixers()
			->registerCustomFixers($config->getCustomFixers())
			->useRuleSet(new RuleSet($config->getRules()))
			->setWhitespacesConfig(new WhitespacesFixerConfig(
				$config->getIndent(),
				$config->getLineEnding()
			))
			->getFixers();
	}

	public static function fixtures(): array
	{
		$cases = [];

		foreach (glob(__DIR__ . '/integration/*.in.php') as $input) {
			$name = basename($input, '.in.php');
			$cases[$name] = [$input, dirname($input) . '/' . $name . '.out.php'];
		}

		return $cases;
	}

	#[DataProvider('fixtures')]
	public function testFixture(string $input, string $expected): void
	{
		$this->assertSame(file_get_contents($expected), static::fix($input));
	}

	/**
	 * The set must not keep changing a file it has already fixed
	 */
	#[DataProvider('fixtures')]
	public function testIdempotency(string $input, string $expected): void
	{
		$this->assertSame(file_get_contents($expected), static::fix($expected));
	}
}
