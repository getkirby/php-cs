<?php
/**
 * @var string|null $alt
 * @var \Kirby\Cms\File $file
 */

extract([
	'alt' => $alt ?? null
]);

echo $file->url();
