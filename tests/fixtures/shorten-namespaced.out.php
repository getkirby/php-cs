<?php

namespace Kirby\Demo;
use Kirby\Cms\File;
use Kirby\Cms\Model;
use Kirby\Cms\Page;
use Kirby\Cms\Site;
use Kirby\Exception\NotFoundException;
use Kirby\Filesystem\Asset;
use Kirby\Toolkit\Stringable;

/**
 * @property Site $site
 */
class Demo extends Model implements Stringable
{
	/**
	 * @var Page|null
	 */
	protected Page $page;

	/**
	 * Moves a page
	 *
	 * @param Page $page The page to move
	 * @param array<string, File> $files The files
	 * @param Page[] $siblings The siblings
	 * @return Asset
	 * @throws NotFoundException If the page is gone
	 * @see Page::move()
	 */
	public function go(Page $page): Asset
	{
		return $page->asset();
	}
}
