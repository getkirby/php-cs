<?php

return Kirby\PhpCs\Config::create()->setFinder(
	PhpCsFixer\Finder::create()
		->exclude([
			'vendor',
			'tests/fixtures',
			'tests/integration'
		])
		->in(__DIR__)
);
