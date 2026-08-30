<?php

namespace Kirby\Demo;

class Demo
{
	/**
	 * @param &$data The data, by reference
	 * @param ...$args The arguments
	 * @param Page &$page The page, by reference
	 * @param int $missing Not in the signature at all
	 */
	public function go(array &$data, string ...$args): void
	{
	}

	/**
	 * @param &$spaced Space between ampersand and name
	 */
	public function spaced(array &$spaced): void
	{
	}
}
