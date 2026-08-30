<?php

namespace Kirby\Demo;
use Kirby\Cms\Files;
use Kirby\Cms\Page;

class Demo
{
	public function go(Page $page): Files
	{
		return $page->files();
	}
}
