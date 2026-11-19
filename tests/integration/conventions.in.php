<?php

namespace Kirby\Demo;

use LogicException;

class Conventions
{
	use Alpha, Beta;

	/**
	 * @throws LogicException If the name is empty
	 * @return bool Whether the name is known
	 * @param string $name The name to look up
	 */
	public function has(string $name): bool
	{
		if ('' === $name) {
			throw new LogicException('Empty name');
		}

		return true === in_array($name, $this->names);
	}
}
