<?php

namespace Kirby\Demo;

use LogicException;
use RuntimeException;

class Cleanup
{
	/**
	 * @return array<string, int>|null
	 */
	public function run(array $items): array|null
	{
		// keeps the order
		try {
			return $this->sort($items);
		} catch (LogicException|RuntimeException) {
			exit('Could not sort');
		}
	}
}
