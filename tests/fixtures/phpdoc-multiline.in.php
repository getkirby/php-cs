<?php

namespace Kirby\Demo;

class Demo
{
	/**
	 * Moves the page
	 *
	 * @param string $unit The unit to move by,
	 *                     which may span several
	 *                     lines of description
	 * @param Page[] $pages A list of pages,
	 *                      also spanning lines
	 * @param bool $force Whether to overwrite
	 * @return string The new path
	 * @throws Exception If the page is locked
	 */
	public function go(string $unit, array $pages, bool $force): string
	{
		return $unit;
	}
}
