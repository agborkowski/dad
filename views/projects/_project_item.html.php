<li class="project-item">
	<article class="project">
		<header class="project-header">
			<h4 class="project-title">
				<?= $this->html->link($project->name, ['Projects::show', 'id' => $project->_id]) ?>
				<?php if ($project->archived): ?>
					<span class="label">ARCHIVED</span>
				<?php endif; ?>
			</h4>
			<p><?= $project->description ?></p>
			<p><?= $this->text->pluralize($project->count_discussions(), 'discussion') ?></p>
		</header>
	</article>
</li>
