<?php

namespace Kirby\Demo;

use Kirby\Cms\Page;
use Kirby\Attribute\Internal;
use Kirby\Exception\NotFoundException;
use Kirby\Toolkit\Str;

class Demo
{
	public const MODEL = Page::class;

	#[Internal]
	public function go(): void
	{
		$page = new Page();
		Page::create();

		if ($page instanceof Page) {
			Str::slug('demo');
		}

		try {
			$page->save();
		} catch (NotFoundException $e) {
		}
	}
}
