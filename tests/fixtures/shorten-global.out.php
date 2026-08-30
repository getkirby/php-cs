<h1>Hi</h1>

<?php
/**
 * @var \Kirby\Cms\Page $page
 * @return \Kirby\Cms\Files
 */
function children(\Kirby\Cms\Page $page): \Kirby\Cms\Files
{
	return $page->files();
}
?>

<?php foreach ($page->children() as $child): ?>
	<p><?= $child->title() ?></p>
<?php endforeach ?>
