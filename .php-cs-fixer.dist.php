<?php

// the package applies its own code style to itself, apart from the
// test fixtures, whose formatting is the thing under test
return Kirby\PhpCs\Config::create()->setFinder(
	PhpCsFixer\Finder::create()
		->exclude(['vendor', 'tests/fixtures', 'tests/integration'])
		->in(__DIR__)
);
