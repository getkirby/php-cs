<?php

namespace Kirby\Demo;
use Kirby\Cms\File;

class Demo
{
	/**
	 * @param File $file The content file
	 * @param \Kirby\Filesystem\File $asset The file on disk
	 * @return File
	 */
	public function go(File $file, \Kirby\Filesystem\File $asset): File
	{
		return $file;
	}
}
