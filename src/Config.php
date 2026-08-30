<?php

namespace Kirby\CodingStandards;

use Kirby\CodingStandards\Fixer\ClassBlockSeparationFixer;
use Kirby\CodingStandards\Fixer\NamespacedFullyQualifiedStrictTypesFixer;
use Kirby\CodingStandards\Fixer\PhpdocNoRedundantTypesFixer;
use Kirby\CodingStandards\RuleSet\KirbyRiskySet;
use Kirby\CodingStandards\RuleSet\KirbySet;
use PhpCsFixer\Config as PhpCsFixer;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

/**
 * Creates a PHP CS Fixer config with the Kirby code style applied.
 * Each repository only adds its own finder:
 *
 * ```php
 * return Kirby\CodingStandards\Config::create()->setFinder(
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
				new PhpdocNoRedundantTypesFixer()
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
