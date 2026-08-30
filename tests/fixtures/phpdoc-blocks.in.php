<?php

namespace Kirby\Demo;

/**
 * A docblock that belongs to no function at all
 *
 * @package Kirby Demo
 */
class Demo
{
	/**
	 * @var array The cache
	 */
	protected array $cache = [];

	/**
	 * Nothing redundant here
	 *
	 * @param Page[] $pages A list of pages
	 */
	public function first(array $pages): void
	{
	}

	/**
	 * @param string $unit The unit
	 */
	public function second(string $unit): void
	{
	}

	/**
	 * @param Page[] $pages A list of pages
	 */
	public function third(array $pages): void
	{
	}

	/**
	 * @param int $level The level
	 */
	public function fourth(int $level): void
	{
	}
}
