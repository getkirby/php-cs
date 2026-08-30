<?php

namespace Kirby\PhpCs\Tests;

use Kirby\PhpCs\Fixer\ClassBlockSeparationFixer;
use Kirby\PhpCs\Fixer\NamespacedFullyQualifiedStrictTypesFixer;
use Kirby\PhpCs\Fixer\PhpdocNoRedundantTypesFixer;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Tokenizer\Tokens;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use SplFileInfo;

class FixerTest extends TestCase
{
	protected static function fixer(string $name): FixerInterface
	{
		if (strtok($name, '-') === 'shorten') {
			$fixer = new NamespacedFullyQualifiedStrictTypesFixer();
			$fixer->configure(['import_symbols' => true]);
			return $fixer;
		}

		return match (strtok($name, '-')) {
			'block'  => new ClassBlockSeparationFixer(),
			'phpdoc' => new PhpdocNoRedundantTypesFixer()
		};
	}

	public static function fixtures(): array
	{
		$cases = [];

		foreach (glob(__DIR__ . '/fixtures/*.in.php') as $input) {
			$name = basename($input, '.in.php');
			$cases[$name] = [$name, $input, dirname($input) . '/' . $name . '.out.php'];
		}

		return $cases;
	}

	#[DataProvider('fixtures')]
	public function testFixture(string $name, string $input, string $expected): void
	{
		$fixer  = static::fixer($name);
		$code   = file_get_contents($input);
		$tokens = Tokens::fromCode($code);

		$fixer->fix(new SplFileInfo($input), $tokens);
		$this->assertSame(file_get_contents($expected), $tokens->generateCode());
	}

	/**
	 * Applying a fixer twice must not change anything the second time
	 */
	#[DataProvider('fixtures')]
	public function testIdempotency(string $name, string $input, string $expected): void
	{
		$fixer  = static::fixer($name);
		$tokens = Tokens::fromCode(file_get_contents($expected));

		$fixer->fix(new SplFileInfo($expected), $tokens);
		$this->assertSame(file_get_contents($expected), $tokens->generateCode());
	}
}
