<?php

namespace Kirby\Demo;

class Demo extends \Kirby\Cms\Model
{
	/**
	 * Moves a page
	 *
	 * @param \Kirby\Cms\Page $page The page to move
	 * @param \Kirby\Cms\Page[] $pages The siblings
	 * @param bool $force Whether to overwrite
	 * @param bool $bare
	 * @param string $unused Not in the signature
	 * @return \Kirby\Cms\Page The moved page
	 */
	public function move(\Kirby\Cms\Page $page, array $pages, bool $force = false, bool $bare = true): \Kirby\Cms\Page
	{
		if ($force === true) {
			\Kirby\Toolkit\Str::slug( $page->title() );
		}

		return $page;
	}
	protected static string $key = 'view';
	use Alpha;
	private array $cache = array();
	public const DEFAULT = 'listed';
	public static array $types = [];
	protected int $count = 0;
	public array $data = [];
}
