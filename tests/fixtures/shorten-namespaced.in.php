<?php

namespace Kirby\Demo;

class Demo
{
	public function go(\Kirby\Cms\Page $page): \Kirby\Cms\Files
	{
		return $page->files();
	}
}
