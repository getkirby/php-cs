<?php

namespace Kirby\Demo;
use Kirby\Cms\File;
use Kirby\Cms\Page;
use Kirby\Cms\Role;

class Demo
{
	protected Page $plain;
	protected ?File $nullable = null;
	protected \Kirby\Cms\Site|null $union = null;
	protected \Kirby\Cms\User&Role $intersection;

	public function go(Page|null $page): Page|null
	{
		return $page;
	}
}
