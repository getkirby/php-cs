<?php

namespace Kirby\PhpCs;

use Kirby\PhpCs\Fixer\ClassBlockSeparationFixer;
use Kirby\PhpCs\Fixer\NamespacedFullyQualifiedStrictTypesFixer;
use Kirby\PhpCs\Fixer\NoBlankLinesAfterPhpdocFixer;
use Kirby\PhpCs\Fixer\NoMultipleStatementsPerLineFixer;
use Kirby\PhpCs\Fixer\PhpdocNoRedundantTypesFixer;
use Kirby\PhpCs\Fixer\StatementIndentationFixer;
use Kirby\PhpCs\RuleSet\KirbyRiskySet;
use Kirby\PhpCs\RuleSet\KirbySet;
use PhpCsFixer\Config as PhpCsFixer;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

/**
 * Creates a PHP CS Fixer config with the Kirby PHP code style applied.
 * Each repository only adds its own finder:
 *
 * ```php
 * return Kirby\PhpCs\Config::create()->setFinder(
 *     PhpCsFixer\Finder::create()->in(__DIR__)
 * );
 * ```
 */
final class Config
{
	/**
	 * @param $risky Whether to include the rules that can change behaviour
	 */
	public static function create(bool $risky = true): PhpCsFixer
	{
		$set = $risky === true ? '@Kirby/style:risky' : '@Kirby/style';

		return (new PhpCsFixer('Kirby'))
			->setParallelConfig(ParallelConfigFactory::detect())
			->registerCustomFixers([
				new ClassBlockSeparationFixer(),
				new NamespacedFullyQualifiedStrictTypesFixer(),
				new NoBlankLinesAfterPhpdocFixer(),
				new NoMultipleStatementsPerLineFixer(),
				new PhpdocNoRedundantTypesFixer(),
				new StatementIndentationFixer()
			])
			->registerCustomRuleSets([
				new KirbySet(),
				new KirbyRiskySet()
			])
			->setRules([$set => true])
			->setRiskyAllowed($risky)
			->setIndent("\t");
	}
}
