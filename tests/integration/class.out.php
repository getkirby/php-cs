<?php

namespace Kirby\Demo;

use Kirby\Cms\Model;
use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

class Demo extends Model
{
	use Alpha;

	public const DEFAULT = 'listed';

	public static array $types = [];

	public array $data = [];

	protected int $count = 0;
	private array $cache = [];

	protected static string $key = 'view';

	/**
	 * Moves a page
	 *
	 * @param $page The page to move
	 * @param Page[] $pages The siblings
	 * @param $force Whether to overwrite
	 * @param string $unused Not in the signature
	 * @return Page The moved page
	 */
	public function move(Page $page, array $pages, bool $force = false, bool $bare = true): Page
	{
		if ($force === true) {
			Str::slug($page->title());
		}

		return $page;
	}
}
