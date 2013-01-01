<div class="two columns projects-nav">
	<?= $this->html->link(
		'+ New Project',
		['Projects::add', 'http:method' => 'GET'],
		['class' => 'button small radius']
	) ?>
</div>

<section class="ten columns">
	<ul class="no-bullet">
		<?php
		foreach ($projects as $project) {
			echo $this->element->render('project_item', ['project' => $project]);
		}
		?>
	</ul>
</section>