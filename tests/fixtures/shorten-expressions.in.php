<?php

namespace Kirby\Demo;

use Kirby\Cms\Page;

class Demo
{
	public const MODEL = \Kirby\Cms\Page::class;

	#[\Kirby\Attribute\Internal]
	public function go(): void
	{
		$page = new \Kirby\Cms\Page();
		\Kirby\Cms\Page::create();

		if ($page instanceof \Kirby\Cms\Page) {
			\Kirby\Toolkit\Str::slug('demo');
		}

		try {
			$page->save();
		} catch (\Kirby\Exception\NotFoundException $e) {
		}
	}
}
