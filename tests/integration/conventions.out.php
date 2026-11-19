<?php

namespace Kirby\Demo;

use LogicException;

class Conventions
{
	use Alpha;
	use Beta;

	/**
	 * @param $name The name to look up
	 * @return bool Whether the name is known
	 * @throws LogicException If the name is empty
	 */
	public function has(string $name): bool
	{
		if ($name === '') {
			throw new LogicException('Empty name');
		}

		return in_array($name, $this->names) === true;
	}
}
