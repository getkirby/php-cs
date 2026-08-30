<?php

namespace Kirby\Demo;

class Demo
{
	protected \Kirby\Cms\Page $plain;
	protected ?\Kirby\Cms\File $nullable = null;
	protected \Kirby\Cms\Site|null $union = null;
	protected \Kirby\Cms\User&\Kirby\Cms\Role $intersection;

	public function go(\Kirby\Cms\Page|null $page): \Kirby\Cms\Page|null
	{
		return $page;
	}
}
