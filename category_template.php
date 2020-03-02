<li>
	<a href="/category?<?=$category['title']?>" id="choice"><?=$category['title']?></a>
	<?php if(@$category['childs']): ?>
	<ul>
		<?php echo categories_to_string($category['childs']); ?>
	</ul>
	<?php endif; ?>
</li>