<?php

namespace Kirby\Demo;

class Demo
{
	/**
	 * @param \Kirby\Cms\File $file The content file
	 * @param \Kirby\Filesystem\File $asset The file on disk
	 * @return \Kirby\Cms\File
	 */
	public function go(\Kirby\Cms\File $file, \Kirby\Filesystem\File $asset): \Kirby\Cms\File
	{
		return $file;
	}
}
