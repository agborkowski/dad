<section class="row message new">
		<div class="one column creator-avatar">
			<?= $this->gravatar->image($current_user->gravatar_email, [
				'default' => '/img/john_doe_avatar.png',
				'size' => 80
			]) ?>
		</div>
		<div class="eight columns end" data-behavior="expandable">
			<div class="collapsed_content">
				Add a message ...
			</div>
			<div class="expanded_content" style="display:none;">
				<?= $this->element->render('wysihtml5-toolbar'); ?>
				<?= $this->form->create(null, ['url' => $new_message_path]) ?>
					<?= $this->form->textarea('content', [
						'id' => 'wysihtml5-textarea',
						'rows' => 10,
						'placeholder' => 'Add a massage...'])
					?>
					<?= $this->form->submit('Add this message', ['class' => 'button small radius']) ?>
				<?= $this->form->end() ?>
			</div>
		</div>
</section>