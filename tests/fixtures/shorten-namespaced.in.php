<?php

namespace Kirby\Demo;

/**
 * @property \Kirby\Cms\Site $site
 */
class Demo extends \Kirby\Cms\Model implements \Kirby\Toolkit\Stringable
{
	/**
	 * @var \Kirby\Cms\Page|null
	 */
	protected \Kirby\Cms\Page $page;

	/**
	 * Moves a page
	 *
	 * @param \Kirby\Cms\Page $page The page to move
	 * @param array<string, \Kirby\Cms\File> $files The files
	 * @param \Kirby\Cms\Page[] $siblings The siblings
	 * @return \Kirby\Filesystem\Asset
	 * @throws \Kirby\Exception\NotFoundException If the page is gone
	 * @see \Kirby\Cms\Page::move()
	 */
	public function go(\Kirby\Cms\Page $page): \Kirby\Filesystem\Asset
	{
		return $page->asset();
	}
}
