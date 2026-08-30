<?php

namespace Kirby\Cms;

class Demo
{
	/**
	 * @param \DateTime $date The date
	 * @param \Kirby\Cms\Page $page A class from this very namespace
	 * @throws \InvalidArgumentException If the date is invalid
	 * @return \Throwable|null
	 */
	public function go(\DateTime $date, \Kirby\Cms\Page $page): \Throwable|null
	{
		if ($date instanceof \DateTimeImmutable) {
			throw new \InvalidArgumentException();
		}

		return null;
	}
}
