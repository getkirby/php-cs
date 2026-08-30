<h1><?= $page->title() ?></h1>

<?php
/**
 * @var \Kirby\Cms\Page $page
 */
$children = $page->children()->listed();
?>

<?php foreach ($children as $child): ?>
	<p><?= $child->title() ?></p>
<?php endforeach ?>
