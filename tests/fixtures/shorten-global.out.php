<h1>Hi</h1>

<?php foreach ($page->children() as $child): ?>
	<p><?= $child->title() ?></p>
<?php endforeach ?>
