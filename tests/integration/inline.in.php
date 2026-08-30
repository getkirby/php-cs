<ul class="columns">
	<?php foreach ($images as $filename): ?>
	<?php
	$image = $page->images()->findBy('name', $filename);
	$thumb = $page->images()->findBy('name', $filename . '-thumb') ?? $image;
	?>
	<li><img src="<?= $thumb->url() ?>" alt="<?= $image->alt() ?>"></li>
	<?php endforeach ?>
</ul>

<svg>
	<g class="labels">
		<?php $i = 0; foreach ($versions as $version): ?>
		<text y="<?= 30 + $i * 30 ?>"><?= $version['name'] ?></text>
		<?php $i++; endforeach ?>
	</g>
</svg>
