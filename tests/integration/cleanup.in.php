<?php

namespace Kirby\Demo;

use LogicException;
use RuntimeException;

class Cleanup
{
	/**
	 * @return null|array<string, int>
	 */
	public function run(array $items): array|null
	{
		//keeps the order
		try {
			return $this->sort($items, );
		} catch (LogicException | RuntimeException) {
			die('Could not' . ' ' . 'sort');
		}
	}
}
