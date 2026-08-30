<?php

namespace Kirby\Demo;

class Demo
{
	/**
	 * @param $unit The unit
	 * @param $slug The slug
	 * @param $force Whether to overwrite
	 * @param Page[] $pages A list of pages
	 * @param int<1, 9> $level The nesting level
	 * @param string $bare
	 */
	public function go(
		string $unit,
		string|null $slug,
		bool $force,
		array $pages,
		int $level,
		string $bare
	): void {
	}

	/**
	 * @param $unit The unit
	 * @param $whatever The value
	 */
	public function again(string $unit, $whatever): void
	{
	}
}
